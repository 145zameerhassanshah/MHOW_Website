<table class="table table-responsive table-striped table-sm data_table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tour</th>
            <th>Event</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Request Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tours as $key => $tour)
            @php
                $eventTitle = $tour->event;
                $title = $tour->title;

                $eventNames = match ($title) {
                    'egypt-tour' => [
                        'cairo' => 'Cairo, Egypt',
                        'alexandria' => 'Alexandria, Egypt',
                        'tunis' => 'Tunis, Tunisia',
                        'upcoming_event_one' =>
                            'Steigenberger Hotel El Tahrir, 2 Kasr Al Nile, Ismailia, Qasr El Nil Cairo, 4272111 | Wednesday 15th May 2024 @ 19:00',
                        'upcoming_event_two' =>
                            'Holiday Inn Citystars, Ali Rashed Street, Cairo, 11757 | Sunday 19th May 2024 @ 18:00',
                        'upcoming_event_three' =>
                            'Tolip Royal Alexandria, 252 El Gaish Road Mustafa Kemal Alexandria, 5434044 | Tuesday 21st May 2024 @19:00',
                        'upcoming_event_four' =>
                            'Marigold Hotel, Angle Rue Ibn, Nadim & Chabia, Tunis, 1073 | Sunday 12th May 2024 @ 18:00',
                    ],
                    'centralasia-tour' => [
                        'upcoming_event_one' => '5TH AUGUST 2024 | 7pm | Plaza Hotel | Almaty, Kazakhstan',
                        'upcoming_event_two' => '8TH AUGUST 2024 | 7pm | Ambassador Hotel | Bishkek, Kyrgyzstan',
                        'upcoming_event_three' => '10th AUGUST 2024 | 2pm | Hampton by Hilton | Tashkent, Uzbekistan',
                        'upcoming_event_four' => '13th AUGUST 2024 | 7pm | Paradise Plaza Hotel | Bukhara, Uzbekistan',
                        'upcoming_event_five' => '14th AUGUST 2024 | 7pm | Movenpick Hotel | Samarkand, Uzbekistan',
                    ],
                    'eastafrica-tour' => [
                        'upcoming_event_one' => '15TH SEPTEMBER 2024 | 3pm | Skynest Residences | Nairobi, Kenya',
                        'upcoming_event_two' =>
                            '20TH SEPTEMBER 2024 | 7pm | Golden Tulip Venue | Dar Es Salaam, Tanzania',
                        'upcoming_event_three' => '22ND SEPTEMBER 2024 | 3pm | CBD Hotel | Dar Es Salaam, Tanzania',
                        'upcoming_event_four' => '29th SEPTEMBER 2024 | 3pm | Hyatt Regency | Addis Ababa, Ethiopia 🇪🇹',
                        'upcoming_event_five' => '17TH SEPTEMBER 2024 | 3pm | Skynest Residences | Nairobi, Kenya',
                    ],
                    'westafrica-tour' => [
                        'upcoming_event_one' => "23TH OCTOBER 2024 | 7pm | Sant'egidio | Abidjan, Côte d'Ivoire",
                        'upcoming_event_two' => "29TH OCTOBER 2024 | 7pm | Maurissonn Hotel | Bouake, Côte d'Ivoire",
                        'upcoming_event_five' =>
                            "26TH OCTOBER 2024 | 2pm | Universal Hotel | Yamoussoukro, Côte d'Ivoire",
                    ],
                    default => [],
                };

                $eventName = $eventNames[$eventTitle] ?? $eventTitle;
            @endphp
            <tr>
                <td>#{{ ++$key }}</td>
                <td>{{ ucfirst(str_replace('-', ' ', $tour->title)) }}</td>
                <td>{{ $eventName }}</td>
                <td>{{ $tour->first_name . ' ' . $tour->surname }}</td>
                <td>{{ $tour->email }}</td>
                <td>{{ $tour->phone }}</td>
                <td>{{ $tour->gender }}</td>
                <td>{{ $tour->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
