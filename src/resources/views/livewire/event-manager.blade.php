<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Quản lý sự kiện
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Calendar Side Menu -->
        <div class="col-span-12 xl:col-span-4 2xl:col-span-3">
            <div class="box p-5 intro-y">
                <button type="button" class="btn btn-primary w-full"
                    onclick="Livewire.dispatch('openModal', { component: 'create-event' })">
                    <i class="w-4 h-4 mr-2" data-lucide="edit-3"></i> Thêm sự kiện mới
                </button>
                <div class="border-t border-b border-slate-200/60 dark:border-darkmode-400 mt-4 py-3"
                    id="calendar-events">
                    @if(count($events) > 0)
                        @foreach($events as $event)
                            <div class="relative">
                                <div
                                    class="event p-3 -mx-3 cursor-pointer transition duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md flex items-center">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <div class="pr-10">
                                        <div class="event__title truncate">{{ $event['event_name'] }}</div>
                                        <div class="text-slate-500 text-xs mt-0.5">
                                            {{ \Carbon\Carbon::parse($event['event_date'])->format('d/m/Y') }}
                                            @if($event['event_location'])
                                                <span class="mx-1">•</span> {{ $event['event_location'] }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a class="flex items-center absolute top-0 bottom-0 my-auto right-0" href="javascript:;"
                                    wire:click="openEventModal({{ $event['id'] }})">
                                    <i data-lucide="edit" class="w-4 h-4 text-slate-500"></i>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="text-slate-500 p-3 text-center" id="calendar-no-events">Chưa có sự kiện nào</div>
                    @endif
                </div>
            </div>
        </div>
        <!-- END: Calendar Side Menu -->

        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box p-5" wire:ignore>
                <div class="full-calendar" id="calendar"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.19/locales/vi.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                    droppable: true,
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                    },
                    initialDate: "{{ now()->format('Y-m-d') }}",
                    initialView: 'dayGridMonth',
                    locale: 'vi',
                    navLinks: true,
                    editable: true,
                    dayMaxEvents: true,
                    events: @json($events),
                    eventClick: function (info) {
                        const eventId = info.event.id;
                        Livewire.dispatch('openEventModal', { eventId: eventId });
                    },
                    dateClick: function (info) {
                        Livewire.dispatch('setEventDate', { date: info.dateStr });
                        Livewire.dispatch('openEventModal');
                    }
                });

                calendar.render();

                document.addEventListener('livewire:initialized', () => {
                    Livewire.on('refreshCalendar', () => {
                        calendar.refetchEvents();
                    });
                });

                document.addEventListener('click', function (e) {
                    if (e.target.classList.contains('modal-backdrop')) {
                        Livewire.dispatch('closeEventModal');
                    }
                });
            });
        </script>
    @endpush
</div>

@script
<script>
    $wire.on('refresh-calendar', (e) => {
        $wire.loadEvents();
    });
</script>
@endscript