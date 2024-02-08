@extends('layouts.master')

@push('css')
    <style>
        fieldset {
            border: 2px groove;

        }

        .ui-autocomplete {
            z-index: 1050;
            width: 220px;
            list-style: none
        }

        .client-suggestion {
            display: flex;
            /* Use flexbox to arrange image and name in a row */
            flex-direction: row;
            /* Ensure a horizontal layout */
            align-items: center;
            /* Vertically center items within the suggestion container */
            padding: 5px;
            /* Add padding for spacing */
            border-bottom: 1px solid #ccc;
            /* Add a border between suggestions */
            /* z-index: 999; */
            background-color: rgb(111, 111, 111);
            color: white;
        }

        .client-name {
            color: rgb(255, 255, 255)
        }
    </style>
@endpush


@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary page-title">أستلام نقدية</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('receive_cash.store') }}" autocomplete="off">
                @csrf

                <div class="row">


                    <div class="form-group col-md-6">
                        <label for="receive_date">تاريخ أستلام النقدية</label>
                        <input type="date" class="form-control" id="receive_date" name="receive_date">
                        @error('receive_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">
                        <label for="finish_date">تاريخ تسليم الخدمة</label>
                        <input type="date" class="form-control" id="finish_date" name="finish_date">
                        @error('finish_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4" id="client_div" style="margin-top: 15px">
                        <label for="client_id">
                            العميل
                        </label>

                        <div class="search-input">
                            <input type="text" name="search" id="search" class="form-control" placeholder="بحث">
                            <input type="text" name="client_id" id="client_id" hidden>
                        </div>
                        @error('client_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 child-repeater-table">
                        <table class="table table-bordered table-responsive" id="table">
                            <thead>
                                <tr>
                                    <th>الخامة</th>
                                    <th>الطول</th>
                                    <th>العرض</th>
                                    <th>الكمية</th>
                                    <th>السعر</th>

                                    <th>حساب السعر</th>

                                    <th>
                                        <a href="javascript:void(0)" class="btn btn-success addRow">
                                            أضافة
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>

                                    <td>
                                        <select class="custom-select mr-sm-2" id="material_id" name="material_id[]">
                                            <option value="" readonly>أختار من الخامات</option>
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">{{ $material->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td>
                                        <input type="number" name="height[]" step="0.01" class="form-control"
                                            style="width: 150px;" placeholder="الطول">

                                    </td>
                                    <td>
                                        <input type="number" name="width[]" step="0.01" class="form-control"
                                            style="width: 150px;" placeholder="العرض">

                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" class="form-control" style="width: 150px;"
                                            placeholder="الكمية">

                                    </td>

                                    <td>
                                        <input type="number" name="price[]" class="form-control" style="width: 150px;"
                                            placeholder="السعر" readonly>

                                    </td>
                                    <th><a href="javascript:void(0)" class="btn btn-warning calcPrice">
                                            حساب السعر</a></th>

                                    <th><a href="javascript:void(0)" class="btn btn-danger deleteRow">
                                            حذف</a></th>



                                </tr>
                            </tbody>


                        </table>
                    </div>
                </div>



                <div class="row">

                    <div class="form-group col-md-6" style="margin-top: 15px">
                        <label for="service_price" step="0.01"> سعر الخدمة</label>
                        <input type="number" readonly class="form-control" name="service_price" id="service_price">
                        @error('service_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-md-6 form-group">
                        <label for="type">نوع الدفع</label>
                        <select name="type" id="type" class="custom-select mr-sm-2">
                            <option value="cash">كاش</option>
                            <option value="online">أونلاين</option>
                        </select>
                        @error('type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="form-group col-md-4"
                        style="flex-wrap: wrap;
                    display: flex;
                    justify-content: center;
                    align-content: center;
                    margin-top: 15px">

                        <button id="calculatePriceBtn" style="height: 50px" class="btn btn-primary " type="button">حساب سعر
                            الخدمة</button>
                    </div> --}}

                </div>




                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="paid_amount"> المبلغ المدفوع</label>
                        <input type="number" step="0.01" class="form-control" name="paid_amount" id="paid_amount">
                        @error('paid_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
 
                    <div class="form-group col-md-4">
                        <label for="remaining_amount"> المبلغ المتبقى</label>
                        <input type="number" step="0.01" class="form-control" name="remaining_amount"
                            id="remaining_amount">
                        @error('remaining_amount')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                </div>
                <div class="row">

                    <div class="form-group col-md-12">
                        <label for="description">الوصف</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">تأكيد</button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        jQuery(document).ready(function($) {

            // Function to calculate the total service price
            function calculateServicePrice() {
                var totalPrice = 0;
                // Loop through each price input
                $('input[name="price[]"]').each(function() {
                    // Get the price value and add it to the total
                    var price = parseFloat($(this).val()) || 0;
                    totalPrice += price;
                });
                // Set the calculated total price in the service price input field
                $('#service_price').val(totalPrice);
            }

            // Call the calculateServicePrice function when the page is ready
            calculateServicePrice();
            // Your jQuery code here
            $('thead').on('click', '.addRow', function() {
                var tr = '<tr>' +
                    '<td>' +
                    '<select class="custom-select mr-sm-2" id="material_id" name="material_id[]">' +
                    '<option value="" readonly>أختار من الخامات</option>';
                // Add options for each material
                @foreach ($materials as $material)
                    tr += '<option value="{{ $material->id }}">{{ $material->name }}</option>';
                @endforeach
                tr += '</select>' +
                    '</td>' +
                    '<td><input type="number" name="height[]" step="0.01" class="form-control" style="width: 150px;" placeholder="الطول"></td>' +
                    '<td><input type="number" name="width[]" step="0.01" class="form-control" style="width: 150px;" placeholder="العرض"></td>' +
                    '<td><input type="number"  name="quantity[]" class="form-control" style="width: 150px;" placeholder="الكمية"></td>' +
                    '<td><input type="number"  name="price[]" readonly class="form-control" style="width: 150px;" placeholder="السعر"></td>' +
                    '<td><a href="javascript:void(0)" class="btn btn-warning calcPrice"> حساب السعر </a></td>' +
                    '<td><a href="javascript:void(0)" class="btn btn-danger deleteRow"> حذف </a></td>';
                $('#tbody').append(tr);
            });

            $('tbody').on('click', '.calcPrice', function() {
                // Get the current row
                var row = $(this).closest('tr');

                // Get the values from the inputs in the current row
                var height = row.find('input[name="height[]"]').val();
                var width = row.find('input[name="width[]"]').val();
                var quantity = row.find('input[name="quantity[]"]').val();
                var materialId = row.find('select[name="material_id[]"]').val();
                var clientId = $("#client_id").val();

                // Make an AJAX request to get the price for this specific row
                $.ajax({
                    url: "{{ route('prices.getPrice') }}", // Replace with the actual route
                    type: 'GET',
                    data: {
                        height: height,
                        width: width,
                        quantity: quantity,
                        material_id: materialId,
                        client_id: clientId
                    },
                    success: function(data) {
                        // Update the price input in this row with the received price
                        row.find('input[name="price[]"]').val(data.price);

                        calculateServicePrice();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                        // Handle the error here, e.g., display an error message
                    }
                });
            });

            $('tbody').on('click', '.deleteRow', function() {
                $(this).parent().parent().remove();
            });

            // Rest of your jQuery code...
        });
        // Get references to the input fields
        const servicePriceInput = document.getElementById('service_price');
        const paidAmountInput = document.getElementById('paid_amount');
        const remainingAmountInput = document.getElementById('remaining_amount');

        // Add an event listener to servicePriceInput and paidAmountInput
        servicePriceInput.addEventListener('input', updateRemainingAmount);
        paidAmountInput.addEventListener('input', updateRemainingAmount);

        // Function to update the remaining_amount input field
        function updateRemainingAmount() {
            const servicePrice = parseFloat(servicePriceInput.value) || 0;
            const paidAmount = parseFloat(paidAmountInput.value) || 0;
            const remainingAmount = servicePrice - paidAmount;

            remainingAmountInput.value = remainingAmount;
        }
    </script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $.noConflict();
        jQuery(document).ready(function($) {

            $("#search").autocomplete({
                source: function(request, response) {
                    // Send an AJAX request to fetch matching product data
                    $.ajax({
                        url: "{{ route('clients.autocomplete') }}", // Replace with the actual route
                        dataType: "json",
                        data: {
                            term: request.term,
                        },
                        success: function(data) {
                            console.log(data);
                            var mappedData = $.map(data, function(item) {
                                // Create a custom HTML element for each suggestion
                                var suggestionHtml =
                                    '<div class="client-suggestion">' +
                                    '<div class="client-name">' + item.name +
                                    '</div>' +
                                    '</div>';
                                // console.log(suggestionHtml);
                                return {
                                    label: item
                                        .name, // Displayed in the autocomplete dropdown
                                    value: item
                                        .id, // Value placed in the input field when selected
                                    html: suggestionHtml, // Custom HTML for the suggestion
                                };
                            });
                            console.log(mappedData);
                            // Display autocomplete suggestions with custom HTML
                            response(mappedData);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("AJAX Error:", textStatus, errorThrown);
                            // Handle the error here, e.g., display an error message
                            response(
                                []
                            ); // Return an empty array to prevent autocomplete dropdown
                        },

                    });
                },
                minLength: 1,
                position: {
                    my: "right+15 top",
                    at: "right bottom",
                },
                width: 100, // Adjust the width as needed
                autoFill: true,
                select: function(event, ui) {
                    $("#client_id").val(ui.item.value);
                    $("#search").val(ui.item.label);
                    return false;
                }

            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                // Append the custom HTML to the autocomplete dropdown
                return $("<li>")
                    .append(item.html)
                    .appendTo(ul);
            };


        })
    </script>
@endpush
