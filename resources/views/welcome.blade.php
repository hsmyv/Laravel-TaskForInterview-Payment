<x-layout>
    <div style="text-align: center; margin-top: 20%;">
        <form action="{{route("checkout", $invoice)}}" method="GET">
            <h1>{{ $invoice->full_name }}</h1>
                    <br>
                    <p>{{ $invoice->description }}</p>
                    <br>
                    <h1>{{{$invoice->amount}}} $</h1>
                    <button type="submit"
                        style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Pay</button>

        </form>
         </div>

</x-layout>
