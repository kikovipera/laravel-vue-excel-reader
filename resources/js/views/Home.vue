<template>
    <div class="flex justify-center items-center">
        <div class="text-center">
            <p class="text-xl text-gray-600 tracking-wider uppercase font-bold">Stores Dashboard</p>
            <div class="py-4  w-full text-right  ">
                <label class="file-select">
                    <div class=" bg-grey-light w-full cursor-pointer bg-teal-500 hover:bg-grey text-grey-darkest font-bold py-3 px-4 rounded inline-flex items-center justify-center text-center ">
                        <span class="text-white"><i class="fa fa-file-upload fa-1x pr-1"></i> Select File </span>

                    </div>
                    <input type="file" id="file" @change="uploadFile" ref="inputFile"/>
                </label>
                <p class="text-red-500 text-center" v-if="upload_error">{{upload_error}}</p>
            </div>
            <div class="bg-white rounded-lg shadow w-full container  relative" v-if="all_stores.length>0">
                <table class="border-collapse table-fixed  bg-white  relative">
                    <thead>
                    <tr class="text-center items-center">
                        <th class="bg-gray-100  top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                            <label class="text-teal-500  px-2 py-2 rounded-lg ">id</label>
                        </th>
                        <th class="bg-gray-100  top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                            <label class="text-teal-500    px-2 py-2 rounded-lg ">address</label>
                        </th>
                        <th class="bg-gray-100  top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                            <label class="text-teal-500  px-2 py-2 rounded-lg "> city</label>
                        </th>
                        <th class="bg-gray-100  top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs">
                            <label class="text-teal-500 px-2 py-2 rounded-lg "> Sales</label>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="store in all_stores" :key="store.id">

                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{store.id}}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{store.address}}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200  ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{store.city}}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{store.sales}}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        data() {
            return {
            }
        },
        computed: {
            ...mapGetters(['all_stores','upload_error'])
        },
        mounted() {
            this.$store.dispatch('all_stores')
        },
        methods: {
            uploadFile(e){
                const fileInput = document.getElementById('file');
                let filePath = fileInput.value;

                // Allowing xls and xlsx only
                let allowedExtensions =
                    /(\.xls|.xlsx)$/i;
                if (!allowedExtensions.exec(filePath)) {
                    this.$store.dispatch('set_error','Invalid file type')
                    fileInput.value = '';
                    return false;
               }
                this.error = false
                const file = e.target.files[0];
                const formData = new FormData();
                formData.append('file', file);
                this.$store.dispatch('uploadFile',formData)
                fileInput.value = '';
            }
        }
    }
</script>
