@extends('layouts.admin.main')

@section('content')
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			</div>		
            <ul class="nav navbar-top-links navbar-right">		
                <li>
                    <a href="javascript:void(0);" class="logout_do">
                        <i class="fa fa-sign-out"></i> Выйти
                    </a>
                </li>
            </ul>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Чат #{{ $chat_id }}</h2>
					@if (session('error'))
						<div class="alert alert-danger">{{ session('error') }}</div>
					@endif
					@if (session('success'))
						<div class="alert alert-danger">{{ session('success') }}</div>
					@endif					
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Панель администратора</a>
                        </li>
                        <li class="active">
                            <strong>Чат {{ $chat_id }}</strong>
                        </li>
                    </ol>
                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
			<div class="row">
					<div class="col-lg-12">
							<div class="ibox chat-view">
								<div class="ibox-content">
									<div class="row">
										<div class="col-md-12">
											<div class="chat-discussion">
												@if ($list->count())
													@foreach ($list as $msg)
														<div class="chat-message @if ($msg->sender_id == $left_id) left @else right @endif">
															<img class="message-avatar" src="img/a1.jpg" alt="">
															<div class="message">
																<a class="message-author" href="#"> {{ $msg->name }}</a>
																<span class="message-date"> {{ date('d.m.Y - H:i', strtotime($msg->created_at)) }} </span>
																<span class="message-content">
																	@if ($msg->msg_type == 'default')
																		{!! $msg->text !!}
																	@else
																		{!! $msg->text !!}
																	@endif
																</span>
															</div>
														</div>														
													@endforeach
												@endif 
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="chat-message-form" style="padding: 15px;">
												<div class="form-group">
													<form action="{{ route('admin_msg_add', $chat_id) }}" method="POST" enctype="multipart/form-data">
														<textarea class="form-control message-input" name="message" placeholder="Введите сообщение..."></textarea>
														<br />
														<input type="file" name="file" class="form-control">
														<br />
														<input type="submit" class="btn btn-primary" value="Отправить сообщение">
													</form>
												</div>
											</div>
										</div>
									</div>


								</div>

							</div>
					</div>

				</div>


        </div>
        <div class="footer">
            <div class="pull-right">
                
            </div>
            <div>
                
            </div>
        </div>
        </div>
@endsection