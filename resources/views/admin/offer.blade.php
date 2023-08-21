@extends('admin.templates.app')
@section('title', 'Offre d\'emploi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Offre d'emploi: {{ $offer->title }}</h4>
                </div>
                <div class="card-body">
                    @include('alert')
                    <div class="table-responsive table-hover">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>
                                        Titre
                                    </th>
                                    <td>
                                        {{ $offer->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {!! $offer->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        脡tudes requises
                                    </th>
                                    <td>
                                        {{ $offer->school }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Comp茅tences requises
                                    </th>
                                    <td>
                                        @foreach (explode(' ', $offer->skills) as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Date de cl么ture
                                    </th>
                                    <td>
                                        {{ $offer->end_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Recruteur
                                    </th>
                                    <td>
                                        {{ $offer->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        @if (auth()->user()->hasRole('Admin'))
                                            @if ($offer->is_valid)
                                                @if ($offer->applications->count() > 0)
                                                    <a href="{{ route('admin.offers.applications', $offer->id) }}"
                                                        class="btn btn-info btn-round">
                                                        <i class="fa fa-eye"></i> Voir les candidatures
                                                    </a>
                                                @else
                                                    <p class="font-weight-bold">Pas encore de candidature</p>
                                                @endif
                                                <a href="{{ route('admin.offers.delete', $offer->id) }}"
                                                    class="btn btn-danger btn-round mb-1">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </a>
                                                <a href="{{ route('recruiter.offer.edit', $offer->id) }}"
                                                    class="btn btn-warning btn-round mb-1">
                                                    <i class="fa fa-trash"></i> Modifier
                                                </a>
                                            @else
                                                <a href="{{ route('admin.offers.check', $offer->id) }}"
                                                    class="btn btn-success btn-round mb-1">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            @endif
                                        @endif

                                        {{-- @if (auth()->user()->hasRole('Recruiter'))
                                            <a href="#" class="btn btn-primary btn-round">
                                                <i class="fa fa-edit"></i>Modifier
                                            </a>
                                        @endif --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
