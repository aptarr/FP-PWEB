<x-app-layout>
<div class="mt-8 flex items-center justify-center">
        <div class="w-4/5 min-h-800">

                <div class="text-4xl">
                    Admin Page
                </div>
            <div class="w-full flex text-sm font-semibold bg-white mt-5">
                <div class="w-1/4 border border-gray-200 text-center py-2">
                NO
                </div>
                <div class="w-1/4 border border-gray-200 text-center py-2">
                REPORT TYPE
                </div>
                <div class="w-1/4 border border-gray-200 text-center py-2">
                    DESCRIPTION
                </div>
                <div class="w-1/4 border border-gray-200 text-center py-2">
                    LINK GIGS
                </div>
            </div>
            @if(count($reports) > 0)
                @foreach($reports as $index => $report)
                    <div class="w-full flex text-sm font-semibold bg-white">
                        <div class="w-1/4 border border-gray-200 text-center py-2">
                            {{ $loop->iteration }}
                        </div>
                        <div class="w-1/4 border border-gray-200 text-center py-2">
                            {{$report->report_type}}
                        </div>
                        <div class="w-1/4 border border-gray-200 text-center py-2">
                            {{ $report->description}}

                        </div>
                        <div class="w-1/4 border border-gray-200 text-center py-2">
                            <a href="{{ route('service.show', ['id' => $report->service_id, 'user_id' => $report->user_id]) }}" class="text-decoration-none">
                                link
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="flex p-3 px-5 font-base border border-b-gray-300">
                No pending orders to show
            </div>
            @endif
        </div>
</div>


</x-app-layout>
