@extends('admin.templates.app')
@section('title', 'Offre d\'emploi')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des offres d'emploi disponibles</h4>
                </div>
                <div class="card-body">
                    @include('alert')
                    <div class="table-resposive table-hover">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Titre
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Date de clôture
                                </th>
                                <th class="text-right">
                                    UUtilisateur
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>
                                            {{ $offer->title }}
                                        </td>
                                        <td>
                                            {!! Str::limit($offer->description, 50) !!}
                                        </td>
                                        <td>
                                            {{ $offer->end_at }}
                                        </td>
                                        <td class="text-right">
                                            {{ $offer->user->name }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.offer.show', $offer->id) }}"
                                                class="btn btn-danger btn-round">
                                                <i class="fa fa-eye"></i>
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
