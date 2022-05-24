<template>
  <div id="app">
    <header>
      <div class="logo">
      <img width="40" src="@/assets/img/logo.png" alt="Spotify logo">
  </div>
  </header>

  <main>
    <div class="container">
      <form class="pt-4" @change="selectGenere">
    <label class="text-white me-2">Filtra per genere</label>
    <select v-model="genere">
      <option value="">All</option>
      <option value="jazz">Jazz</option>
      <option value="rock">Rock</option>
      <option value="pop">Pop</option>
      <option value="metal">Metal</option>
    </select>
  </form>
    
      <div class="row" v-if="loading">
        <div class="col-3" v-for="(disco, index) in filterGenere"
          :key="index">
            <div class="card">
              <img :src="disco.poster" class="card-img-top" :lt="disco.author" />
              <div class="card-body">
                <h6 class="card_title text-uppercase">{{disco.title}}</h6>
                <p class="card-text m-0">
                  {{disco.author}}
                </p>
                <small class="small_text">{{disco.year}}</small>
              </div>
            </div>
        </div>
      </div>
      <!-- /.row -->

      <div class="row" v-else>
        <h1 class="text-white">{{ error }}</h1>
      </div>
    </div>
    <!-- /.container -->
  </main>
  </div>
</template>

<script>

import axios from "axios";

import state from '@/state.js';

export default {
  name: "MainComponent",

  data() {
    return {
      API_url: "http://localhost/PHP/php-ajax-dischi/php_dischi/api.php",
      loading: false,
      dischi: null,
      error: "Sorry there are problems, please try again later....",
      genere: '',
    };
  },

  methods: {
    selectGenere() {
      console.log("Hai selezionato un genere");
      console.log(this.genere);
      state.genere = this.genere;
      console.log(state);
    },
  },

  computed: {
    filterGenere(){
      if (state.genere) {
        console.log(state.genere);
        return this.dischi.filter(disco => {
       return disco.genre.toLowerCase().includes(state.genere.toLowerCase())
      })
      } else {
        return this.dischi
      }
    }
  },

  mounted() {
    axios.get(this.API_url).then((response) => {
      //console.log(this);
      console.log(response);
      this.dischi = response.data;
      this.loading = true;
    });
  },


};
</script>

<style lang="scss">
@import '@/assets/scss/style.scss';
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;

  header{
        background-color: #1E2D3B;
        padding: 1rem;
        img{
    width: 40px;
}
    }

    main {
  background-color: #2E3A46;
  .row {
    padding: 3rem 0;
  }

  .col-3{
    width: 18%;
    margin: 0.5rem;
  }
  img {
    max-width: 90%;
    object-fit: cover;
    aspect-ratio: 1/1;
    padding: 1rem;
  }

  .card{
    display: flex;
    align-items: center;
    height: 100%;
    background-color: #1E2D3B;
    border: none;
    text-align: center;
  }

  .card_title{
    color:  #E9FAFF;
  }

  .card-text, .small_text{
    color: #808080;
  }

}

}
</style>
