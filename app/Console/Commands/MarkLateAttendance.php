<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\StudentSchedule;
use App\Models\Absents;

class MarkLateAttendance extends Command
{
    protected $signature = 'attendance:mark-late {--grace= : override grace minutes}';
    protected $description = 'Mark students as late if they have schedule today and missed the start (no attendance recorded)';

    public function handle()
    {
        $now = Carbon::now();
        $dayId = $now->dayOfWeekIso; // 1..7
        $grace = (int) ($this->option('grace') ?? config('attendance.late_grace_minutes', 5));

        // find all student schedules for today
        $schedules = StudentSchedule::where('day_id', $dayId)->with('time')->get();

        $count = 0;
        foreach ($schedules as $sch) {
            if (! $sch->time) continue;
            
            $studentId = $sch->student_id;
            
            
            // already has an attendance record for today?
            $exists = Absents::where('student_id', $studentId)
                ->whereDate('date', $now->toDateString())
                ->exists();
                if ($exists) continue;

            // compute start and late cutoff
            try {
                $start = Carbon::createFromFormat('H:i:s', $sch->time->times_in)
                               ->setDate($now->year, $now->month, $now->day);
                $end = Carbon::createFromFormat('H:i:s', $sch->time->times_out)
                             ->setDate($now->year, $now->month, $now->day);
            } catch (\Exception $e) {
                // skip invalid time formats
                continue;
            }

            $lateCutoff = (clone $start)->addMinutes($grace);
            print($now);
            // mark absent if now passed the late cutoff and still during session or even after (option)
            if ($now->greaterThanOrEqualTo($lateCutoff)) {
                print("yes");
                Absents::create([
                    'student_id' => $studentId,
                    'date' => $now->toDateString(),
                    'attendance_status' => 'absent',
                ]);
                $count++;
            }
        }

        $this->info("MarkLateAttendance: marked {$count} records as late.");
        return 0;
    }
}