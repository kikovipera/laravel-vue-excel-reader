import axios from 'axios'
axios.defaults.baseURL = process.env.MIX_API_URL

const state = {
    all_stores: false,
    upload_error:false
}


const getters = {
    upload_error(){
        return state.upload_error;
    },
    all_stores(){
        return state.all_stores;
    },
}

const actions = {
    all_stores(context){
        axios.get( 'store').then(response =>{

            context.commit('SET_STORES', response.data);

        }).catch(function(response){
            alert('Unable to fetch stores data.')
        });
    },
 async uploadFile(context, resource) {
    return  await new Promise(resolve => {
     axios.post("store",   resource )
        .then(({ data }) => {
          context.commit('SET_STORES', data);

          resolve(data);
        })
        .catch(({ response }) => {
            console.log(response.data.message)
            context.commit('SET_UPLOAD_ERROR', response.data.message);
        });
    });
  },
    set_error(context,error){
        context.commit('SET_UPLOAD_ERROR', error);
    }
}

const mutations = {
    SET_STORES(state, data) {
       state.all_stores = data;

    },
    SET_UPLOAD_ERROR(state, data) {
       state.upload_error = data;

    }
};

export default {
    state,
    getters,
    actions,
    mutations
};

