@extends('admin.templates.app')
@section('title', "Modification d'une offre d'emploi")
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Modification d'une offre d'emploi</h2>
            </div>
            <div class="col-lg-12">
                @include('alert')
                <form class="form" action="{{ route('recruiter.offer.update', $offer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="image">Image de l'offre</label>
                                <input type="file" class="form-control" class="single-input-secondary" name="image" id="image"
                                    placeholder="Image de l'offre">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="title">Titre de l'offre @include('required')</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $offer->title }}"
                                    placeholder="Titre de votre offre" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="description">Descriptif de l'offre @include('required')</label>
                                <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9"
                                    placeholder="Descriptif de l\'offre" required>{{ $offer->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="end_at">Date de clôture @include('required')</label>
                                <input type="date" class="form-control" name="end_at" id="end_at" value="{{ $offer->end_at }}"
                                    placeholder="Date de clôture" required>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="school">Quelle est le niveau d'étude requis ?</label>
                                <select class="form-control" name="school" id="school" required>
                                    <option @selected($offer->school == "Universitaire")>Universitaire</option>
                                    <option @selected($offer->school == "École secondaire")>École secondaire</option>
                                    <option @selected($offer->school == "École Primaire")>École Primaire</option>
                                    <option @selected($offer->school == "Avec ou sans diplôme")>Avec ou sans diplôme</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="skills">Compétences @include('required')</label>
                                <textarea class="form-control w-100" name="skills" id="skills" cols="30" rows="9"
                                    placeholder="compétences requises séparées par une virgule" required>{{ $offer->skills }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label for="category_id">Catégorie @include('required')</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($offer->category_id == $category->id)>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Modifier et Poster</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
