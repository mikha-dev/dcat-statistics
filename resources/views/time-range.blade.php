<style>
</style>
<div class="card dcat-box" style="margin-top: 10px;">
    <div style="padding-bottom: 20px;padding-top: 20px;width: 100%;">
        <div style="float: left;margin-left: 20px">
            <h4>
                {{\OsKoala\Statistics\StatisticsServiceProvider::setting("title") ?? "Website data statistics"}}
            </h4>
        </div>
        <select id="time-range" class="form-control" style="width: 200px!important;float: right;margin-right: 30px">
            <option value="{{admin_url('auth/statistics?day=1')}}"
                    @if(isset($_GET['day']) && $_GET['day'] == 1) selected @endif>
                Last 24 hours
            </option>
            <option value="{{admin_url('auth/statistics?day=3')}}"
                    @if(isset($_GET['day']) && $_GET['day'] == 3) selected @endif
            >
                Last 3 days
            </option>
            <option value="{{admin_url('auth/statistics?day=7')}}"
                    @if(isset($_GET['day']) && $_GET['day'] == 7) selected @endif
            >
                Last 7 days
            </option>
            <option value="{{admin_url('auth/statistics?day=30')}}"
                    @if(isset($_GET['day']) && $_GET['day'] == 30) selected @endif
            >
                Last 30 days
            </option>
            <option value="{{admin_url('auth/statistics?day=90')}}"
                    @if(isset($_GET['day']) && $_GET['day'] == 90) selected @endif
            >
                Last 90 Days
            </option>
        </select>
    </div>
</div>
<script>
    let time_range_select = document.getElementById("time-range");

    time_range_select.onchange = function () {
        let index = time_range_select.selectedIndex;
        let value = time_range_select.options[index].value;
        window.location.href = value
    }
</script>
