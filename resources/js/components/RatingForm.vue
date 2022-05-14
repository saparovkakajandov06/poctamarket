<template>
    <div>
        <form @submit.prevent="setRate">
            <input type="hidden" v-model="formData.product_id">
            <star-rating v-model="formData.rating"></star-rating>
            <input class="mb10 mt10 rating-btn-101" type="submit" value="Ugratmak">
        </form>
    </div>
</template>

<script>
    export default {
        props: ['product','url'],
        data () {
            return {
                formData: {

                }
            }
        },
        methods: {
            setRate() {
                this.formData.product_id = this.product.id
                
                axios.post(this.url,this.formData)
                    .then(data => {location.reload()})
                    .catch(err => console.log(err))
            }
        }
    }
</script>
