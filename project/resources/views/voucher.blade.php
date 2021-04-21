{{ $feesBook->student_name }}
<br/>
<br/>
<br/>
<table border="1px">
    @foreach($feesCategory as $feesCategory)
        <tr>
            <td>
                {{ $feesCategory->name }}
            </td>
            <td>
                @if($feesCategory->id == $feesBook->cat_id)
                    {{ $feesBook->value }}
                @endif
            </td>
        </tr>
    @endforeach
</table>
