<template>
    <table-view :options="options" :dialogParam="dialogParam"></table-view>
</template>

<script>
import {reactive,getCurrentInstance} from "vue"
import tableView from "@/components/common/table"
export default {
    components:{tableView},
    setup(props) {
        const {ctx,proxy} = getCurrentInstance()
        const options = reactive([
            {label:'品牌图标',value:'thumb',type:'avatar'},
            {label:'品牌名称',value:'name'},
            {label:'创建时间',value:'created_at'},
        ]);


        // 表单配置 
        const addColumn = [
            {label:'品牌名称',value:'name'},
            {label:'品牌图标',value:'thumb',type:'avatar',span:24},
        ]
        const dialogParam = reactive({
            rules:{
                name:[{required:true,message:'不能为空'}]
            },
            view:{column:addColumn},
            add:{column:addColumn},
            edit:{column:addColumn},
        })
        return {options,dialogParam}
    }
}
</script>

<style>

</style>