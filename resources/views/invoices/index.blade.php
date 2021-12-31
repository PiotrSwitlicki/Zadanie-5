@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('invoices.create') }}" title="Utwórz fakturę"> <i class="fas fa-plus-circle"></i> Utwórz fakturę
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Numer kolejności</th>
            <th>Nr faktury</th>
            <th>NIP kupującego</th>
            <th>NIP sprzedającego</th>
            <th>Nazwa Produktu</th>
            <th>Kwota Netto</th>
            <th>Data Wystawienia</th>
            <th>Data edycji</th>
            <th width="280px">Funkcje</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ $invoice->buyer_nip }}</td>
                <td>{{ $invoice->seller_nip }}</td>
                <td>{{ $invoice->product_name }}</td>
                <td>{{ $invoice->net_sum }} zł</td>
                <td>{{ $invoice->date }}</td>
                <td>{{ $invoice->edit_date }}</td>
                
          
                
                <td>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">

               <!--     <a href="{{ route('invoices.show', $invoice->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>  -->

                        <a href="{{ route('invoices.edit', $invoice->id) }}" >
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $invoices->links('pagination::bootstrap-4') }}

@endsection