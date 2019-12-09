<!--
* @description nothing
* @fileName home2.vue
* @author 彭成刚
* @date 2019/12/09 15:11:51
* @version V1.0.0
!-->
<template>
  <Card>
    home2
    <Table :columns="columns1"
           :data="data1"></Table>
  </Card>
</template>

<script>
export default {
  data () {
    return {
      columns1: [
        {
          title: 'Name',
          key: 'username'
        },
        {
          title: 'Pass',
          key: 'userpass'
        }
      ],
      data1: []
    }
  },

  components: {},

  computed: {},

  mounted () {
    this.$api('select.php').then(res => {
      console.info('res', res)
      this.data1 = res.data
    })
  },

  methods: {}
}

</script>
<style lang='less'>
</style>
