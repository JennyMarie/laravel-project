@extends('layouts.app')

@section('css')


@endsection

@section('content')

    <div id="gallery">
      <div class="row">
        <div class="col-md-3">
            <div class="form-group">
              <label for="search">Search:</label>
                <input required="required" name="search" v-model="search" type="text" class="form-control"> 
            </div>
            <button type="button" class="btn btn-info" @click="searchImage()">Click</button>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-4 col-12 card-list" v-for="id in getCurrentImages"v-cloak>
          <image-card
          :objectid="id"
          >
          </image-card>
        </div>
          <pagination :pagination="pagination" 
            :callback="callback" 
            :options="paginationOptions">
          </pagination>
      </div>
    </div>
    


@endsection

@section('js')
<script src="{{ asset('js/gallery.js') }}"></script>

@endsection