<x-layout>
    <!--Checkout-->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form method="POST" action="{{ route('pay') }}">
                @csrf
                <div class="form-group checkout-small-element">
                    <label for="">Card Number</label>
                    <input type="text" class="form-control" name="number" placeholder="Card Number"
                        value="{{ old('number') }}">
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Expiration Date</label>
                    <input type="text" class="form-control" name="expiration_date" placeholder="Expiration Date"
                        value="{{ old('expiration_date') }}" saved>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Cvv</label>
                    <input type="tel" class="form-control" name="cvv" placeholder="cvv"
                        value="{{ old('cvv') }}">
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name"
                        value="{{ old('full_name') }}">
                </div>
                <div class="form-group checkout-btn-container">
                    <h3>Price: {{ $invoice->amount }}</h3>
                    <button type="submit"
                        style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                        Pay</button>

                </div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

            </form>

        </div>

    </section>
</x-layout>
