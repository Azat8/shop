<h2>История заказов</h2>
{{--<table class="table">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th scope="">#</th>--}}
{{--        <th scope="" class="def-font-mlhedruli">Заказ создан</th>--}}
{{--        <th scope="" class="def-font-mlhedruli">Статус заказа</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    <tr>--}}
{{--        <td>1</td>--}}
{{--        <td>2020/02/09</td>--}}
{{--        <td>Completed</td>--}}
{{--    </tr>--}}

{{--    </tbody>--}}
{{--</table>--}}
    <div class="account-content">

        <div class="account-layout">

            <div class="account-items-list">
                <div class="account-table-content">

                    {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}

                </div>
            </div>

        </div>

    </div>
