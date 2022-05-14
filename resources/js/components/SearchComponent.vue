<template>
    <div class="search-input-container">
        <form action="" method="" @submit.prevent="getPageWithData">
            <input 
                class="search-input" 
                type="text" 
                name="" 
                id=""
                v-model="alias"
                
                @keyup="getData($event.target.value)"
            >
            <!-- http://tpmarket/product/search/results/kkjnm -->
            <input type="submit" value=" " class="search-submit">
            <a id="hidden-url" :href="'https://market.turkmenpost.gov.tm/search/results/' + alias"></a>
        </form>
        <div v-if="foundData" class="search-items-divs">
            <ul class="search-items-container" style="margin:0">
                <li 
                    v-for="item in foundData"
                    :key="item.id"
                >
                    <a
                        :href="(item.code) ? (product + item.id) : (category + item.id)">
                        {{ item.name_tk }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lang'],
        data () {
            return {
                foundData:[],
                product: '/product/',
                category: '/catalog/',
                alias: ''
            }
        },

        methods: {
            getPageWithData () {
                let el = document.getElementById('hidden-url')
                el.click()
            },
            getData (val) {
                if(val.length > 2){
                    axios.get('/search/'+val).then((response)=>{
                        this.foundData=[]
                        this.foundData = response.data
                    })
                    
                } else {
                    this.foundData=[]
                }
            }
        }
    }
</script>
