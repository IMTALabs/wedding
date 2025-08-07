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
                <button type="button" class="btn btn-primary w-full mt-2" wire:click="openEventModal" data-tw-toggle="modal" data-tw-target="#event-modal">
                    <i class="w-4 h-4 mr-2" data-lucide="edit-3"></i> Thêm sự kiện mới
                </button>
                <div class="border-t border-b border-slate-200/60 dark:border-darkmode-400 mt-6 mb-5 py-3"
                     id="calendar-events">
                    @if(count($events) > 0)
                        @foreach($events as $event)
                            <div class="relative">
                                <div class="event p-3 -mx-3 cursor-pointer transition duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-darkmode-400 rounded-md flex items-center">
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
                                <a class="flex items-center absolute top-0 bottom-0 my-auto right-0" href="javascript:;" wire:click="openEventModal({{ $event['id'] }})">
                                    <i data-lucide="edit" class="w-4 h-4 text-slate-500"></i>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="text-slate-500 p-3 text-center" id="calendar-no-events">Chưa có sự kiện nào</div>
                    @endif
                </div>
            </div>
            <div class="box p-5 intro-y mt-5">
                <div class="flex">
                    <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                    <div class="font-medium text-base mx-auto">{{ $currentMonth }}</div>
                    <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                </div>
                <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                    <div class="font-medium">CN</div>
                    <div class="font-medium">T2</div>
                    <div class="font-medium">T3</div>
                    <div class="font-medium">T4</div>
                    <div class="font-medium">T5</div>
                    <div class="font-medium">T6</div>
                    <div class="font-medium">T7</div>

                    @foreach($calendarGrid as $day)
                        <div class="py-0.5 rounded relative {{ $day['class'] }}">
                            {{ $day['day'] }}
                            @if(isset($day['events']) && count($day['events']) > 0)
                                <div class="w-3 h-3 bg-primary rounded-full absolute left-0 right-0 bottom-0 mx-auto"></div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if(count($legendEvents) > 0)
                    <div class="border-t border-slate-200/60 dark:border-darkmode-400 pt-5 mt-5">
                        @foreach($legendEvents as $event)
                            <div class="flex items-center">
                                <div class="w-2 h-2 {{ $event['color'] }} rounded-full mr-3"></div>
                                <span class="truncate">{{ $event['label'] }}</span>
                                <div class="h-px flex-1 border border-r border-dashed border-slate-200 mx-3 xl:hidden"></div>
                                <span class="font-medium xl:ml-auto">{{ $event['date'] }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <!-- END: Calendar Side Menu -->

        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box p-5">
                <div class="full-calendar" id="calendar"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->
    </div>

    <!-- BEGIN: Event Modal -->
    <div id="event-modal"  tabindex="-1" aria-hidden="false" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        {{ $isEditing ? 'Chỉnh sửa sự kiện' : 'Thêm sự kiện mới' }}
                    </h2>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="event_name" class="form-label">Tên sự kiện</label>
                            <input type="text" id="event_name" wire:model="event_name" class="form-control" placeholder="Nhập tên sự kiện">
                            @error('event_name') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-span-12">
                            <label for="event_date" class="form-label">Ngày sự kiện</label>
                            <input type="date" id="event_date" wire:model="event_date" class="form-control">
                            @error('event_date') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-span-12">
                            <label for="event_location" class="form-label">Địa điểm</label>
                            <input type="text" id="event_location" wire:model="event_location" class="form-control" placeholder="Nhập địa điểm">
                            @error('event_location') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-span-12">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea id="description" wire:model="description" class="form-control" rows="3" placeholder="Nhập mô tả sự kiện"></textarea>
                            @error('description') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-span-12">
                            <label for="link_embed" class="form-label">Link nhúng (nếu có)</label>
                            <input type="text" id="link_embed" wire:model="link_embed" class="form-control" placeholder="Nhập link nhúng">
                            @error('link_embed') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        @if($isEditing)
                            <button type="button" class="btn btn-outline-danger mr-1" wire:click="deleteEvent({{ $eventId }})">Xóa</button>
                        @endif
                        <button type="button" class="btn btn-outline-secondary w-24 mr-1" wire:click="closeEventModal" data-tw-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary mr-2 mb-2" wire:loading.attr="disabled">
                            <span wire:loading.remove>
                                Lưu thông tin
                            </span>
                            <span wire:loading>
                                Đang lưu...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-backdrop {{ $showEventModal ? 'show' : '' }}"></div>
    </div>
    <!-- END: Event Modal -->

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize FullCalendar
            var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                droppable: true,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                initialDate: "{{ now()->format('Y-m-d') }}",
                navLinks: true,
                editable: true,
                dayMaxEvents: true,
                events: @json($events),
                eventClick: function(info) {
                    // Get the event ID and open the edit modal
                    const eventId = info.event.id;
                    Livewire.dispatch('openEventModal', { eventId: eventId });
                },
                dateClick: function(info) {
                    // Open the add event modal with the selected date
                    Livewire.dispatch('setEventDate', { date: info.dateStr });
                    Livewire.dispatch('openEventModal');
                }
            });

            calendar.render();

            // Listen for Livewire events to refresh the calendar
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('refreshCalendar', () => {
                    calendar.refetchEvents();
                });
            });

            // Initialize modal backdrop click handler
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('modal-backdrop')) {
                    Livewire.dispatch('closeEventModal');
                }
            });
        });
    </script>
    @endpush
</div>
