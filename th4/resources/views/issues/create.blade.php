<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Issues</title>
</head>
<body>


    <h1 style="margin: 50px 50px">Thêm vấn đề mới</h1>
    <form action="{{ route('issues.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="form-group">
            <label for="title">Người báo cáo sự cố</label>
            <input type="text" class="form-control" name="reported_by" required>    
        </div>
        <div class="form-group">
            <label for="computer_id">Tên máy tính</label>
            <select name="computer_id" id ="computer_id"class="form-control" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}" >{{$computer->computer_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">    
            <label for="event_time">Thời gian báo cáo</label>
            <input type="datetime-local" id="event_time" name="reported_date" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả chi tiết vấn đề</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="urgency">Mức độ sự cố</label>
            <select name="urgency" class="form-control" required>
                <option value="Low" >Low</option>
                <option value="Medium" >Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="status">Trạng thái hiện tại</label>
            <select name="status" class="form-control" required>
                <option value="Open" >Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

</body>