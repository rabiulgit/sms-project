<html>
<head>
    <style type="text/css">

    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <table class="table autosize" cellspacing="0" width="100%">


            <tr>

                <td style="text-align: left;">
                    <h4 style="font-size: 14px; ">Student Name: {{ $feesBook->student_name }}</h4>
                    <h4 style="font-size: 14px;">Class:{{ $feesBook->class }}</h4>
                    <h4 style="font-size: 14px;">Section: {{ $feesBook->section }}</h4>
                </td>

                <td style="text-align: right;">
                    <h4 style="font-size: 14px; ">Payment Id: 00{{$feesBook->id }}</h4>
                    <h4 style="font-size: 14px;">Gender: {{ $feesBook->gender }}</h4>
                    <h4 style="font-size: 14px;">Student Id: {{ $feesBook->student_unique_id }}</h4>
                    <h4 style="font-size: 14px;">Session : {{date('M-y', strtotime($feesBook->session_start))}} to {{date('M-y', strtotime($feesBook->session_end))}}</h4>
                </td>
            </tr>
        </table>
    </div>
    
    <br/>
    <br/>
    <br/>
    <table class="table" cellspacing="0" style="border: 1px solid black;">
       <thead>
        <tr>

            <td style="border: 1px solid black;text-align: center;">SI NO</td>
            <td style="border: 1px solid black;text-align: center;">Particulars</td>
            <td style="border: 1px solid black;text-align: center;">Amount (TK)</td>
        </tr>

    </thead>
    @foreach($feesCategory as $key=> $feesCategory)

    <tr>
        <td style="border: 1px solid black;text-align: center;">
            {{ $key+1 }}
        </td>

        <td style="border: 1px solid black;text-align: left;">
            {{ $feesCategory->name }}
        </td>
        <td style="border: 1px solid black;text-align: right;">
            @if($feesCategory->id == $feesBook->cat_id)
            {{ $feesBook->value }}
            @endif
        </td>

    </tr>

    @endforeach
    <tr>
        
        <td colspan="2" style="border: 1px solid black;text-align: right;">Total</td>
        
        <td style="border: 1px solid black;text-align: right;">{{ $feesBook->value }}</td>
    </tr>
</table>
</body>
</html>