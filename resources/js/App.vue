<template>
    {{groups}}
</template>

<script>
  import { getGroups, getGroupDetail } from './api/group/group';
  export default {
    data() {
      return {
        groups: [],
        groupDetail: []
      }
    },
    created() {
      getGroups().then((res) => {
        this.groups = res.data.groups
      })
    },
    name: 'App',
    components: {
    },
    methods: {
      onClick: (groupId) => {
        getGroupDetail(groupId)
      }
    }
  }
</script>