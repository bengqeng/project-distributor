@if (!empty($log_user))
    @foreach ($log_user as $item)
    <tr data-widget="expandable-table" aria-expanded="true">
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['created_at'] }}</td>
        <td>{{ $item['type_action'] }}</td>
      </tr>
    <tr class="expandable-body">
        <td colspan="4" id="description-log-activity">
            <p style="">
            {!! $item['description'] !!}
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
