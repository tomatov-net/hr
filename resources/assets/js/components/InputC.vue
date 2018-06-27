<template>
    <div class="col-md-5">
        <input :placeholder="placeholder" v-show="show" :id="id_" :class="cls" :name="name" :type="type" v-model="input_data" @change="sendInput" v-on:blur="switch_show" />
        <p v-show="!show" @click.prevent="switch_show">{{ input_data }}</p>
    </div>
</template>

<script>
    export default {
        props:{
            name:{

            },
            id:{

            },
            cls:{

            },
            id_:{

            },
            input:{
            },
            placeholder:{

            },
            type:{
                default: 'text',
                type: String
            }
        },
        data: function () {
            return {
                input_data: '',
                show: false
            };
        },
        mounted:function(){
            this.input_data = this.input;
        },
        methods: {
            switch_show: function () {
                if(this.input_data === ''){
                    this.show = true;
                }
                else{
                    this.show = !this.show;
                }
            },
            sendInput: function (data) {
                var self = this;
                axios.post('/api/change-price', {id: self.id, price: self.input_data});
            }
        }
    }
</script>