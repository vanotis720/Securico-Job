@extends('admin.templates.app')
@section('title', 'Offre d\'emploi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Candidatures a l'Offre d'emploi {{ $applications[0]->offer->title }}</h4>
                </div>
                <div class="card-body">
                    @include('alert')
                    <div class="table-responsive table-hover">
                        <table class="table">
                            <thead>
                                <th>
                                    Candidat
                                </th>
                                <th>
                                    Compétences du candidat
                                </th>
                                <th>
                                    Études faites
                                </th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($applications as $application)
                                    <tr>
                                        <td>
                                            {{ $application->user->first_name . ' ' . $application->user->last_name }}
                                        </td>

                                        <td>
                                            @foreach (explode(',', $application->user->candidate->skills) as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </td>

                                        <td>
                                            {{ $application->user->candidate->school }}
                                        </td>

                                        <td>
                                            @if ($application->state == 'init')
                                                <a href="{{ route('admin.offers.validation', ['id' => $application->id, 'action' => 'accepted']) }}"
                                                    class="btn btn-success btn-round mb-1">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('admin.offers.validation', ['id' => $application->id, 'action' => 'rejected']) }}"
                                                    class="btn btn-warning btn-round mb-1">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            @else
                                                <h5>
                                                    @if ($application->state == 'accepted')
                                                        <span class="text-success">
                                                            Acceptée <i class="fa fa-check"></i>
                                                        </span>
                                                    @else
                                                        <span class="text-danger">
                                                            Rejetée <i class="fa fa-close"></i>
                                                        </span>
                                                    @endif
                                                </h5>
                                            @endif
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
