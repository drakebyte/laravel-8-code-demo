<template>
    <div class="container">
        <button :type="type" class="btn btn-dark mybutton" v-text="test.name" v-on:click="popTheInfo">My button</button>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('My Button Component mounted.')

        axios.post('api/vueroute')
            .then(response => {
                this.test = response.data;
            });
    },

    data: function () {
        return {
            test: {
                name: null,
                type: 'submit'
            },
        }
    },

    props: [
        'text',
        'type'
    ],

    methods: {
        popTheInfo() {
            sessionStorage.setItem('myButtonSession','This is Data from SESSION STORAGE');
            alert('My Button is clicked');
            console.log(sessionStorage.getItem('myButtonSession'));
        }
    }
}
</script>

<style>
.mybutton {
    box-shadow: 5px 5px blue, 10px 10px red, 15px 15px green;
}
</style>