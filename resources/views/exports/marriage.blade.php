<table>
    <thead>
        <tr>
            <th>Number</th>
            <th>Date of Marriage</th>
            <th>Bridegroom Name</th>
            <th>Bridegroom Surname</th>
            <th>Bridegroom Nationality</th>
            <th>Bride Name</th>
            <th>Bride Surname</th>
            <th>Bride Nationality</th>
            <th>First Witness Name</th>
            <th>First Witness Surname</th>
            <th>Second Witness Name</th>
            <th>Second Witness Surname</th>
            <th>Place</th>
            <th>Minister</th>
            <th>Parish Priest</th>
            <th>Date of First Announcement</th>
            <th>Date of Second Announcement</th>
            <th>Date of Third Announcement</th>
            <th>Impediment Dispensation</th>
        </tr>
    </thead>
    <tbody>
        @foreach($marriages as $marriage)
        <tr>
            <td>{{ $marriage->number }}</td>
            <td>{{ $marriage->date_of_marriage ? date('d-m-Y', strtotime($marriage->date_of_marriage)) : '' }}</td>
            <td>{{ $marriage->bridegroom?->name }}</td>
            <td>{{ $marriage->bridegroom?->surname }}</td>
            <td>{{ $marriage->bridegroom?->nationality?->name }}</td>
            <td>{{ $marriage->bride?->name }}</td>
            <td>{{ $marriage->bride?->surname }}</td>
            <td>{{ $marriage->bride?->nationality?->name }}</td>
            <td>{{ $marriage->firstWitness?->name }}</td>
            <td>{{ $marriage->firstWitness?->surname }}</td>
            <td>{{ $marriage->secondWitness?->name }}</td>
            <td>{{ $marriage->secondWitness?->surname }}</td>
            <td>{{ $marriage->parish->name }}</td>
            <td>{{ $marriage->priest?->full_name }}</td>
            <td>{{ $marriage->parishPriest?->full_name }}</td>
            <td>{{ $marriage->date_of_first_announcement ? date('d-m-Y', strtotime($marriage->date_of_first_announcement)) : '' }}</td>
            <td>{{ $marriage->date_of_second_announcement ? date('d-m-Y', strtotime($marriage->date_of_second_announcement)) : '' }}</td>
            <td>{{ $marriage->date_of_third_announcement ? date('d-m-Y', strtotime($marriage->date_of_third_announcement)) : '' }}</td>
            <td>{{ $marriage->impediment_dispensation }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
