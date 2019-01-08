/**
 * Created by haohao on 2017/4/11.
 * 购物车的js 代码
 * 1.创建一个vue的实例
 * 2.通过v-for指令渲染产品数据
 * 3.使用filter（过滤器）对金钱和图片进行格式化
 * 4.使用v-on 实现产品金额的动态计算
 * 5.使用vue-resource 插件来和后台实现交互
 */

// 创建一个vue的实例
//    var vm 可以要可以不要
var vm = new Vue({
    el:'#app' , // 构造参数，实例需要监听的模型范围，对象 #app 下的任何元素都可以背vue操控
    data:{      // data 重点 vue的模型
        totalMoney:0,         // 总金额
        productList:[],       // 定义一个数组
        checkAllFlag:false,   // 定义是否全选
        curProduct:'',        // 保存删除的商品信息
        delFlag:false         // 默认弹出框为false
    },
    filters:{ // 过滤器 对数据实现转换 可以定义全局的 也可以定义局部的 这个是局部的 只有vue的实例才可以使用
        formatMoney:function (value) { // 默认接收一个参数
            return "¥ " + value.toFixed(2) +" 元"; // 返回一个¥ 加上2位小数
        }
    },
    // 这个方法就相当于jq的ready()方法
    mounted:function () { //生命周期的一部分，在实例化创建完成后，需要查询某一个方法 需要定义一个mounted 方法
        this.$nextTick(function () {  // 代码保证 this.$el 在 document 中
            this.cartView();
            // 也可以使用 vm.cartView();
        });
    },
    methods:{   // 所有事件的绑定都会在 methods 中定义
        // cartView() 请求当前的商品的信息
        cartView:function () {
            // 通过this 来调用这个 http方法
            // 通过.then 方法来接受回调  res 就是我们最终拿到的结果
            // 这个也是可以传递参数的
            var _this = this;
            this.$http.get("data/cartData.json",{"id":123}).then(function (res) {
                // 这块的 body里面是我们要用的数据 这是vue-resource 插件封装好的
                _this.productList = res.body.result.list; // 获取result.list 然后赋值给productList 数组
                // _this.totalMoney = res.body.result.totalMoney;
            })
            /**
            ES 6 语法
            let _this = this;
             this.$http.get("data/cartData.json",{"id":123}).then(res=>{ // 这块的=>就表示的是一个function { }里面就相当与函数体
                this.productList = res.body.result.list;  // 好处是 不用吧this 声明到外边来 里面的作用域和外面的作用域是一样的
                this.totalMoney = res.body.result.totalMoney;
             })
            * */
        },
        // 点击 加减 的方法
        changeMoney:function (product, way) {
            if( way >0 ){ //当 way>0 就是点击的 +
                product.productQuentity++; // 数量增加  就相当于 item 的productQuentity
            }else {
                product.productQuentity--; // 否则数量减少
                if(product.productQuentity <0 ){ //
                    product.productQuentity =0;
                }
            }
            this.caleTotalPrice();
        },
        //如何让Vue 监听一个不存在的变量 单选操作
        selectedProduct:function (item) { // 接收的参数
            if( typeof item.checked == 'undefined'){ // 怎样判断一个对象的变量存不存在 看他的typeof == undedined
                /**
                 * 两种全局注册和局部注册  让vue 来监听
                 * 第一个参数 要添加的对象
                 * 第二个参数 添加的变量
                 * 第三个参数 添加的值是什么
                 * 意思是我们通过 Vue全局注册 往item变量中注册一个checked 属性 它的值是 true
                 *
                 * this.$set(item,"checked",true)  局部注册
                 */
                Vue.set(item,"checked",true);
            }else {
                item.checked = !item.checked;
            }
            this.caleTotalPrice();
        },
        // 定义全选 函数
        checkAll:function (flag) {
            this.checkAllFlag = flag ;
            var _this = this;
            this.productList.forEach(function (item,index) { // 用forEach来遍历 productList
                if(typeof item.checked == 'undefined'){ // 先判断 是否有这个 item.checked
                    Vue.set(item,"checked",_this.checkAllFlag);  // 没有 先注册
                }else {
                    item.checked = _this.checkAllFlag;
                }
            });
            this.caleTotalPrice();
        },
        // 计算选中商品的总价
        caleTotalPrice:function () {
            var _this = this;
            this.totalMoney = 0;
            this.productList.forEach(function (item,index) {
               if(item.checked){
                   _this.totalMoney += item.productPrice * item.productQuentity;
               }
            });
        },
        // 点击删除 出现弹框
        delConfirm:function (item) {
            this.delFlag = true;
            this.curProduct = item; // 保存当前删除的对象
        },
        // 点击弹框里面的 ok 确认删除
        delProduct:function () {
            // 通过indexof 来搜索当前选中的商品 找到索引 index
            var index = this.productList.indexOf(this.curProduct);
            // 获取索引 后删除元素 splice(index，1) 两个参数  第一个参数索引 第二个参数 删除个数
            this.productList.splice(index ,1);// 从当前索引开始删，删除一个元素
            this.delFlag = false; // 删除后 弹框消失
        }
    }
});
 /**
 *  定义全局的 过滤器
 *  第一个参数 函数名 第二个参数 回调
 *
 *  Vue.filter("money",function (value) {

  })
 */

