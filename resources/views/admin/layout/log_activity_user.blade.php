@if ($log_user->count() > 0)
    @foreach ($log_user as $item)
    <tr data-widget="expandable-table" aria-expanded="false">
        <td>John Doe</td>
        <td>11-7-2014</td>
        <td>Approved</td>
      </tr>
    <tr class="expandable-body">
        <td colspan="4">
            <p style="">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </td>
    </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">
            Record Kosong
        </td>
    </tr>
@endif
