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
           :data="data1">
      <template slot="operation"
                slot-scope="{ row, index }">
        <Button type="primary"
                style="margin-right:10px;"
                @click="modifyClickHandle(row,index)">修改</Button>
        <Button type="primary"
                @click="deleteClickHandle(row,index)">删除</Button>
      </template>
    </Table>
    <insertData @reload="reload" />
    <Modal v-model="vShow"
           title="修改">
      <Row>
        <Col span="11"
             style="margin-right:10px;">
        name:
        <Input v-model="formData.name"
               placeholder="Enter something..." />
        </Col>
        <Col span="2">
        </Col>
        <Col span="11">
        pass:
        <Input v-model="formData.pass"
               placeholder="Enter something..." />
        </Col>
      </Row>
      <template slot="footer">
        <Button type="primary"
                style="margin-right:10px;"
                @click="modalModifyClickHandle">确定</Button>
      </template>
    </Modal>
  </Card>
</template>

<script>
import insertData from './insertData'
export default {
  data () {
    return {
      formData: {
        id: '',
        name: '',
        pass: ''
      },
      vShow: false,
      columns1: [
        {
          title: 'Name',
          key: 'username'
        },
        {
          title: 'Pass',
          key: 'userpass'
        },
        {
          title: '操作',
          slot: 'operation'
        }
      ],
      data1: []
    }
  },

  components: {
    insertData
  },

  computed: {},

  mounted () {
    // this.$api('select.php').then(res => {
    //   console.info('res', res)
    //   this.data1 = res.data
    // })
    this.showList()
    this.$api('test.php').then(res => {
      console.info('res', res)
    })
  },

  methods: {
    modalModifyClickHandle () {
      const sql = `update person set username='${this.formData.name}',
       userpass='${this.formData.pass}' where id='${this.formData.id}'`
      this.$api('apiUpdate.php', { sql }).then(res => {
        this.vShow = false
        this.showList()
      })
    },
    modifyClickHandle (row, index) {
      const sql = `select * from person where id ='${row.id}'`
      this.$api('api.php', { sql }).then(res => {
        console.info('modifyClickHandle res', res)
        this.formData.id = res.data[0].id
        this.formData.name = res.data[0].username
        this.formData.pass = res.data[0].userpass
        this.vShow = true
      })
    },
    deleteClickHandle (row, index) {
      this.$Modal.confirm({
        title: '提示',
        content: '是否删除',
        onOk: () => {
          this.deleteClickHandleExe(row, index)
        }
      })
    },
    deleteClickHandleExe (row, index) {
      const sql = `delete from person where id = ${row.id}`
      this.$api('apiUpdate.php', { sql }).then(res => {
        this.showList()
      })
    },
    showList () {
      this.$api('api.php', { sql: 'select * from person' }).then(res => {
        console.info('res sql', res)
        this.data1 = res.data
      })
    },
    reload () {
      this.showList()
    }
  }
}

</script>
<style lang='less'>
</style>
