@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('invoices.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">           

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nr faktury:</strong>
                    <input type="text" name="invoice_number" class="form-control" placeholder="" value="{{ $invoice->invoice_number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIP kupującego:</strong>
                    <input type="text" name="buyer_nip" class="form-control" placeholder="" value="{{ $invoice->buyer_nip }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIP sprzedającego:</strong>
                    <input type="text" name="seller_nip" class="form-control" placeholder="" value="{{ $invoice->seller_nip }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nazwa Produktu:</strong>
                    <input type="text" name="product_name" class="form-control" placeholder="" value="{{ $invoice->product_name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kwota Netto:</strong>
                    <input type="text" name="net_sum" class="form-control" placeholder="" value="{{ $invoice->net_sum }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Data Wystawienia:</strong>
                    <input type="text" name="date" class="form-control" placeholder="" value="{{ $invoice->date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </form>
@endsection