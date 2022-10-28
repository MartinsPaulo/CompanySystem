<template>
    <v-card class="pa-2">
        <v-container>
            <h2 class="my-2">{{company.name}}</h2>
            <span class="my-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</span>
            <v-row no-gutters class="mt-6">
                <v-col
                    cols="6"
                    sm="6"
                    md="6"
                >
                    <a
                    class="pa-2 font-weight-black"
                    >
                        Enviar email
                    </a>
                </v-col>
                <v-col
                    cols="6"
                    md="6"
                >
                    <a
                    class="pa-2 font-weight-black"
                    >
                        WhatsApp
                    </a>
                </v-col>
            </v-row>
        </v-container>
    </v-card>
</template>

<script>
export default {
  props: {
    company: Object,
    flat: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    show_company(id) {
      this.$emit("clicked", id);
    },
  },
};
</script>

<style lang="scss" scoped></style>