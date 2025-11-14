<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminResource\Pages;
use App\Models\Admins;
use App\Models\Role;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables as Tables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\AdminCreatedNotification; // PASTIKAN PATH INI BENAR
use Illuminate\Support\Facades\Mail;

class AdminResource extends Resource
{
    protected static ?string $model = Admins::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    // Variabel statis untuk menyimpan password mentah (belum di-hash)
    protected static ?string $newlyGeneratedPassword = null;

    public static function getSlug(): string
    {
        return 'data-admin';
    }

    public static function getNavigationLabel(): string
{
    return 'Data Admin';
}

public static function getPluralLabel(): string
{
    return 'Data Admin';
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                TextInput::make('full_name')
                    ->label('Nama Lengkap')
                    ->maxLength(100)
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(100),

                Select::make('role_id')
                    ->label('Peran (Role)')
                    ->options(Role::pluck('name_role', 'id'))
                    ->searchable()
                    ->required(),

                Textarea::make('address')
                    ->label('Alamat')
                    ->nullable()
                    ->columnSpanFull(),

                Radio::make('status')
                    ->options([
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                    ])
                    ->default('active')
                    ->inline()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Nama Lengkap')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                
                // Relasi harus ada di Model Admins: public function role() { return $this->belongsTo(Role::class); }
                // TextColumn::make('role.name') 
                //     ->label('Peran')
                //     ->badge()
                //     ->color('primary')
                //     ->sortable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                    }),
                    
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            // Halaman List/Index
            'index' => Pages\ListAdmins::route('/'),
        ];
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        // 1. Generate password acak
        self::$newlyGeneratedPassword = Str::random(12);

        // 2. Hash password acak untuk disimpan di database
        $data['password'] = Hash::make(self::$newlyGeneratedPassword);

        if (empty($data['role_id'])) {
        // Beri nilai default, misalnya ID 3 (Asumsi 'Staff')
        $data['role_id'] = 3; 
    }

        return $data;
    }

    protected static function afterCreate(array $data, Admins $record): void
    {
        if (self::$newlyGeneratedPassword) {
            try {
                // Kirim email notifikasi ke Admin baru
                Mail::to($record->email)->send(new AdminCreatedNotification(
                    $record->full_name, 
                    $record->email, 
                    self::$newlyGeneratedPassword 
                ));

                Notification::make()
                    ->title('Berhasil')
                    ->body("Admin {$record->full_name} berhasil dibuat. Email dan password telah dikirim.")
                    ->success()
                    ->send();

            } catch (\Exception $e) {
                // Beri notifikasi jika pengiriman email gagal
                Notification::make()
                    ->title('Peringatan Email Gagal')
                    ->body("Admin berhasil dibuat, tetapi email GAGAL terkirim. Error: " . $e->getMessage())
                    ->danger()
                    ->send();
            }
        }
        
        // Reset variabel statis
        self::$newlyGeneratedPassword = null;
    }

    
}