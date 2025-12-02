@extends('admins.layouts.app')

@section('title', 'Sinar Education | Harga')
@section('title-content', 'Manajemen Harga')

@section('content')
        <!-- MAIN CONTENT -->
        <section class="content mx-auto p-4">
            <div class="container-fluid">

                <div class="bg-white p-8 rounded-xl shadow">

                    <!-- HEADER -->
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-2xl font-bold text-gray-800">Manajemen Harga</h2>

                        <a href="{{ route('admin.prices.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold">
                            + Tambah Harga
                        </a>
                    </div>

                    <!-- TABLE -->
                    <table class="min-w-full border rounded-lg">
                        <thead class="bg-gray-200/50">
                            <tr>
                                <th class="px-4 py-3 text-left">ID</th>
                                <th class="px-4 py-3 text-left">Level</th>
                                <th class="px-4 py-3 text-left">Class</th>
                                <th class="px-4 py-3 text-left">Harga</th>
                                <th class="px-4 py-3 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($prices as $price)
                                <tr class="border-b hover:bg-yellow-50">
                                    <td class="px-4 py-3">{{ $price->id }}</td>

                                    <td class="px-4 py-3">
                                        {{ $price->level->name_level ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $price->class->name_class ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 font-semibold text-green-700">
                                        Rp {{ number_format($price->price, 0, ',', '.') }}
                                    </td>

                                    <td class="px-4 py-3 flex gap-2">

                                        {{-- LIHAT --}}
                                        <a href="{{ route('admin.prices.show', $price->id) }}"
                                            class="flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>

                                        {{-- EDIT --}}
                                        <a href="{{ route('admin.prices.edit', $price->id) }}"
                                            class="flex items-center gap-1 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-1 rounded">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        {{-- HAPUS --}}
                                        <form action="{{ route('admin.prices.destroy', $price->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus harga ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="flex items-center gap-1 bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">
                                        Belum ada data harga.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>

            </div>
        </section>
@endsection

