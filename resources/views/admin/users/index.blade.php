@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Users</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">

                        </div>


                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($users as $user)
                                    <tr>
                                        <td width="250px">
                                            {{ $user->name }}

                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ $user->roles[0]->name }}
                                        </td>
                                        <td>
                                            @if (Cache::has('user-is-online-' . $user->id))
                                                <span class="badge bg-label-success me-1">Online</span>
                                            @else
                                                <span class="badge bg-label-danger me-1">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::createFromDate($user->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    @if ($user->roles[0]->name == 'customer')
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i>
                                                            Delete</a>
                                                    @endif
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="ms-2 mt-2">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </div>



    </div>
@endsection
