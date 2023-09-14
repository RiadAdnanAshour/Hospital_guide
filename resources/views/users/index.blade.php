@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="d-flex justify-content-between align-items-center">
                <h2>إدارة المستخدمين</h2>
                <div>
                    <a class="btn btn-outline-primary btn-dark mr-2" href="{{ route('home2') }}">
                        <i class="fas fa-chevron-circle-left mr-2"></i> رجوع
                    </a>
                    @can('role-create')
                        <a class="btn btn-success" href="{{ route('users.create') }}">إنشاء مستخم جديد</a>
                    @endcan

                </div>
            </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>الرقم</th>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>الأدوار</th>
            <th width="280px">الإجراءات</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                        @endforeach
                    @endif
                </td>

                <td>

                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">عرض</a>
                    @can('person-create')
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">تعديل</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->render() !!}
    <p class="text-center text-primary"><small>البرنامج التعليمي من قبل LaravelTuts.com</small></p>
@endsection
