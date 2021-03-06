@extends('admin.main')

@section('position', '协会动态 -> 近期活动')

@section('content')
    <div>
        <table class="table">
            <tbody>
            <form id="activitymes">
                <tr>
                    <th>活动名称</th>
                    <th>
                        <input style="display: none" name="id" value="{{$result['id']}}"/>
                        <input type="text" name="title" value="{{$result['title']}}"/>
                        <div>
                            <button type="button" class="btn btn-default" onclick="$(this).next().click();">上传海报</button>
                            <input type="file" accept="image/*" onchange="uploadfile(this)" style="display: none"/>
                            <input style="display: none" name="poster" value="{{$result['poster']}}"/>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>活动介绍</th>
                    <th><textarea name="content" rows="7">{{$result['abstract']}}</textarea></th>
                </tr>
            </form>
            <form id="schedule">
                <tr>
                    <th>活动日程表</th>
                    <th>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>阶段</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>地点</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="addschedule">
                            @foreach ($result['schedule'] as $s)
                            <tr>
                                    <th><input type="text" name="stage[]" value="{{$s['stage']}}"/></th>
                                    <th><input type="text" name="beginTime[]" value="{{$s['beginTime']}}"/></th>
                                    <th><input type="text" name="endTime[]" value="{{$s['endTime']}}"/></th>
                                    <th><input type="text" name="place[]" value="{{$s['place']}}"/></th>
                                    <th>
                                        <button type="button" class="btn btn-default" onclick="rmEle(this)">删除</button>
                                    </th>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-default btn-add" id="schedule" onclick="addschedule(this)">添加</button>
                    </th>
                </tr>
            </form>
            <form id="enrollway">
                <tr>
                    <th>报名方式</th>
                    <th>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>途径</th>
                                <th>具体方法</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="addway">
                            @foreach ($result['way'] as $w)
                                <tr>
                                    <th><input type="text" name="title[]" value="{{$w['title']}}"/></th>
                                    <th><input type="text" name="content[]" value="{{$w['content']}}"/></th>
                                    <th>
                                        <button type="button" class="btn btn-default" onclick="rmEle(this)">删除</button>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-default btn-add" id="way" onclick="addway(this)">添加</button>
                    </th>
                </tr>
            </form>
            </tbody>
        </table>

        <div>
            <button type="button" class="btn btn-primary btn-submit">提交</button>
            {{--<button type="button" class="btn btn-primary btn-review">预览</button>--}}
        </div>
    </div>
    <script type="text/javascript">
        function addway(btn){
            var nexthtml = '';
            $("#addway").append(nexthtml);
        }
        function addschedule(btn){
            var nexthtml = '<tr> <th><input type="text" name="stage[]"/></th> <th><input type="text" name="beginTime[]"/></th> <th><input type="text" name="endTime[]"/></th> <th><input type="text" name="place[]"/></th> <th><button type="button" class="btn btn-default" onclick="rmEle(this)">删除</button></th> </tr>';
            $("#addschedule").append(nexthtml);
        }
        function rmEle(btn){
            $(btn).parent().parent().remove();
        }
    </script>
@endsection
