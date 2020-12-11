<label for="yearMonth">
    {{ trans('admin.abouts.year') }}：
    <input type="text"
           id="yearMonth"
           name="event_year_month"
           placeholder="yyyy-mm"
           class="date-picker-year"
           autocomplete="off"
           value="{{ old('event_year_month', $yearMonth) }}"
    >
</label>

@section('styles')
    @parent
    <style>
        .ui-datepicker-calendar {
            display: none;
        }
    </style>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            $('.date-picker-year').datepicker( {
                changeMonth: true,
                changeYear: true,
                yearRange: "c-40:c",
                showButtonPanel: true,
                dateFormat: 'yy-mm',
                onClose: function(dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });
    </script>
@endsection
