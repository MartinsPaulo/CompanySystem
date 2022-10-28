<template>
  <v-app>
     <v-container class="grey lighten-5 d-flex justify-space-around mb-6">
        <v-row no-gutters>
          <v-col class="d-flex mx-2" cols="5" sm="6" md="5">
              <v-text-field
                label="Digite o nome"
                placeholder="Digite o nome"
                solo
                >
              </v-text-field>
          </v-col>
          <v-col class="d-flex mx-2" cols="3" sm="6" md="3">
            <v-select
              :items="states"
              item-text="name"
              item-value="id"
              label="Estados"
              @input="selectIdState($event)"
              solo
            ></v-select>
          </v-col>
          <v-col class="d-flex mx-2" cols="3" sm="6" md="3">
            <v-select
              :items="cities"
              label="Cidades"
              item-text="name"
              item-value="id"
              solo
            ></v-select>
          </v-col>
          <v-col
              class="d-flex justify-space-between mb-6" cols="3" sm="6" md="5"
            v-for="company in companies"
            :key="company.id"
          >
            <CompanyCard :company="company" />
          </v-col>
        </v-row> 
      </v-container>  
  </v-app>
</template>

<script>
import axios from 'axios';
import CompanyCard from "./components/CompanyCard.vue";

export default {
  name: 'App',

  components: {
    CompanyCard
  },

  data() {
    return {
      states: [],
      cities: [],
      companies: [],
      idState: 0,
      search: ""
    }
  },
  methods:{
    selectIdState(e){
      this.idState = e
      this.get_cities(this.idState)
      this.get_companies()
    },
    get_cities(idState){
      axios.get(`http://localhost:8000/api/city/getCitiesForState/${idState}`).then((response) => {
        this.cities = response.data
      })
    },
    get_companies(){
      axios.get(`http://localhost:8000/api/company`).then((response) => {
        console.log(response.data.data)
        this.companies = response.data.data
      })
    }
  },
  mounted(){
    axios.get("http://localhost:8000/api/states").then((response) => {
      this.states = response.data
    })
  }
};
</script>
