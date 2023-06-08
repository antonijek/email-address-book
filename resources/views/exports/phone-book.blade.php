<table class="table">
    <thead>
    @php($style = 'background-color:#CFE2F3; border: 2px solid black; text-align:center; font-weight:bold;')
    <tr>
        <th style="{{$style}}" >Avatar</th>
        <th style="{{$style}}">First name</th>
        <th style="{{$style}}">Last name</th>
        <th style="{{$style}}">Email</th>

    </tr>
    </thead>
    <tbody>
    @foreach($addressBook as $member)
        <tr>
            <td class="align-middle">
                <img src="{{ $member->image?->path }}" width="50" height="auto" class="rounded" alt="">
            </td>
            <td class="align-middle">{{ $member->firstName }}</td>
            <td class="align-middle">{{ $member->lastName }}</td>
            <td class="align-middle">{{ $member->email }}</td>

        </tr>
    @endforeach
    </tbody>
</table>