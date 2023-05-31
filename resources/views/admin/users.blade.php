@extends('admin.templates.app')
@section('title', 'Administration')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des utilisateurs</h4>
                </div>
                <div class="card-body">
                    @include('alert')
                    <div class="table-resposive table-hover">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Nom complet
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Genre
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Membre depuis
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name . ' ' . $user->last_name . ' ' . $user->first_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->sex }}
                                        </td>
                                        <td>
                                            {{ $user->roles->first()->name }}
                                        </td>
                                        <td>
                                            {{ $user->created_at->diffForHumans() }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.users.delete', $user->id) }}" class="btn btn-danger btn-round">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
