@extends('layout')
@section('content')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('products.create') }}">
            {{ __('ADD Product') }}
        </a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ __('Products') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ __('ID') }}
                        </th>
                        <th>
                            {{ __('Name') }}
                        </th>
                        <th>
                            {{ __('Price') }}
                        </th>
                        <th>
                            {{ __('Quantity') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $product->id ?? '' }}
                            </td>
                            <td>
                                {{ $product->name ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td>
                            <td>
                                {{ $product->quantity ?? '' }}
                            </td>
                            <td>
                                @if($product->quantity == 0)
                                    {{ __('Sold Out') }}
                                @else
                                    <a class="btn btn-xs btn-success" href="{{ route('products.cart.add', $product->id) }}">
                                        {{ __('Add To Cart') }}
                                    </a>
                                @endif

                                <a class="btn btn-xs btn-primary" href="{{ route('products.show', $product->id) }}">
                                    {{ __('View') }}
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('products.edit', $product->id) }}">
                                    {{ __('Edit') }}
                                </a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ __('Are You Sure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ __('Delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Product:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
