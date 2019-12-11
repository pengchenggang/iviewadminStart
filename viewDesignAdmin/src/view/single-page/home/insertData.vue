<!--
* @description insertData
* @fileName insertData.vue
* @author 彭成刚
* @date 2019/12/11 11:11:58
* @version V1.0.0
!-->
<template>
  <div>
    <Row>
      <Col span="8">
      name:
      <Input v-model="formData.name"
             placeholder="Enter something..."
             style="width: 300px" />
      </Col>
      <Col span="8">
      pass:
      <Input v-model="formData.pass"
             placeholder="Enter something..."
             style="width: 300px" />
      </Col>
      <Col span="8">
      <Button type="primary"
              @click="insertClickHandle">添加</Button>
      </Col>
    </Row>

  </div>
</template>

<script>
export default {
  data () {
    return {
      formData: {},
      formDataInit: {
        name: '',
        pass: ''
      }
    }
  },

  components: {},

  computed: {},

  mounted () {
    this.formData = { ...this.formDataInit }
  },

  methods: {
    insertClickHandleTest (callback) {
      if (this.formData.name === '' || this.formData.pass === '') {
        this.$Message.warning('表单请填写完整')
      } else {
        callback()
      }
    },
    insertClickHandle () {
      this.insertClickHandleTest(() => {
        let sql = `insert into person (username, userpass) VALUES ('${this.formData.name}', '${this.formData.pass}')`
        this.$api('apiUpdate.php', { sql }).then(res => {
          this.$emit('reload')
          this.formData = { ...this.formDataInit }
        })
      })
    }
  }
}

</script>
<style lang='less' scoped>
</style>
