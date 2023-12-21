<x-app-layout>
@if(session('success'))
        <div class="flex items-center justify-center w-full h-8 py-auto bg-green-300 font-semibold">
            {{ session('success') }}
        </div>
    @endif

<style>
    /* Add your CSS styles here */
    .tab-content {
      display: none;
    }

    .tab.active {
      /* background-color: #ffffff;  */
      border-bottom: 3px solid #000000; Underline for active tab
      color: #000000;
    }

    .tab.inactive {
      color: #c9c9c9; /* Dimmer background color for inactive tabs */
    }
  </style>

<div class="mt-8 flex items-center justify-center">
        <div class="w-4/5 min-h-800">

                <div class="text-4xl">
                    Transaksi
                </div>
                <div class="">
                <div class="">

                    <div class="border border-gray-200 mt-5 bg-white">
                        <div>
                            <div class="flex p-3 px-5 font-semibold border border-b-gray-300">
                                HIstori Transaksi
                            </div>
                            <div class="w-full flex text-sm font-semibold">
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        NO
                                </div>
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        KOST
                                </div>
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        TANGGAL MULAI SEWA
                                </div>
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        LAMA SEWA
                                </div>
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        TOTAL HARGA
                                </div>
                                <div class="w-1/6 border border-gray-200 text-center py-2">
                                        PENYEWA
                                </div>
                            </div>
                            @if(count($transactions) > 0)
                                @foreach($transactions as $transaction)
                                    <div class="w-full flex text-sm font-semibold">
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                            <a href="{{ route('service.show', ['id' => $transaction->service->id, 'user_id' => $transaction->service->user_id]) }}" class="text-decoration-none hover:underline">
                                            {{ $transaction->service->title }}
                                                </a>
                                        </div>
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                            {{ $transaction->tanggal_mulai_sewa }}
                                        </div>
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                        {{ $transaction->lama_sewa }}
                                        </div>
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                        Rp{{ number_format($transaction->harga_total, 0, ',', '.') }}
                                        </div>
                                        <div class="w-1/6 border border-gray-200 text-center py-2">
                                        {{$transaction->user_name}}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div class="flex p-3 px-5 font-base border border-b-gray-300">
                                Tidak ada transaksi yang dapat ditunjukkan
                            </div>
                            @endif
                        </div>

                        
                </div>
            </div>

        </div>
    </div>



</x-app-layout>