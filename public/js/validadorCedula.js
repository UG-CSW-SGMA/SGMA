(function () {
    var a = function (a, b) {
        return function () {
            return a.apply(b, arguments)
        }
    };
    !function (b) {
        var c, d;
        return c = function () {
            function a(a) {
                this.numero = a,
                    this.numero = this.numero.toString(),
                    this.valid = !1, this.codigo_provincia = null,
                    this.tipo_de_cedula = null,
                    this.already_validated = !1
            }
            return a.prototype.validate = function () {
                var a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t; if (10 !== (s = this.numero.length) && 13 !== s) throw this.valid = !1, new Error("Longitud incorrecta."); if (h = 22, this.codigo_provincia = parseInt(this.numero.substr(0, 2), 10), this.codigo_provincia < 1 || this.codigo_provincia > h) throw this.valid = !1, new Error("Código de provincia incorrecto."); if (k = parseInt(this.numero[2], 10), 7 === k || 8 === k) throw new Error("Tercer dígito es inválido."); if (9 === k ? this.tipo_de_cedula = "Sociedad privada o extranjera" : 6 === k ? this.tipo_de_cedula = "Sociedad pública" : 6 > k && (this.tipo_de_cedula = "Persona natural"), g = [], 6 > k) for (c = 10, l = parseInt(this.numero.substr(9, 1), 10), e = 2, t = this.numero.substr(0, 9), m = 0, q = t.length; q > m; m++)b = t[m], f = parseInt(b, 10) * e, f >= 10 && (f -= 9), g.push(f), e = 2 === e ? 1 : 2; if (6 === k) { for (l = parseInt(this.numero.substr(8, 1), 10), c = 11, d = [3, 2, 7, 6, 5, 4, 3, 2], b = n = 0; 7 >= n; b = ++n)g[b] = parseInt(this.numero[b], 10) * d[b]; g[8] = 0 } if (9 === k) for (l = parseInt(this.numero.substr(9, 1), 10), c = 11, d = [4, 3, 2, 7, 6, 5, 4, 3, 2], b = o = 0; 8 >= o; b = ++o)g[b] = parseInt(this.numero[b], 10) * d[b]; for (j = 0, p = 0, r = g.length; r > p; p++)b = g[p], j += b; if (i = j % c, a = 0 === i ? 0 : c - i, 6 === k) { if ("0001" !== this.numero.substr(9, 4)) throw new Error("RUC de empresa del sector público debe terminar en 0001"); this.valid = a === l } if (9 === k) { if ("001" !== this.numero.substr(10, 3)) throw new Error("RUC de entidad privada debe terminar en 001"); this.valid = a === l } if (6 > k) { if (this.numero.length > 10 && "001" !== this.numero.substr(10, 3)) throw new Error("RUC de persona natural debe terminar en 001"); this.valid = a === l } return this
            }, a.prototype.isValid = function () { return this.already_validated || this.validate(), this.valid }, a
        }(), d = function () { function d(c, d) { this.$node = c, this.options = d, this.validateContent = a(this.validateContent, this), this.options = b.extend({}, b.fn.validarCedulaEC.defaults, this.options), this.$node.on(this.options.events, this.validateContent) } return d.prototype.validateContent = function () { var a, b, d, e; if (d = this.$node.val().toString(), a = this.options.strict, a || 10 !== (e = d.length) && 13 !== e || (a = !0), a) try { new c(d).isValid() ? (this.$node.removeClass(this.options.the_classes), this.options.onValid.call(this.$node)) : (this.$node.addClass(this.options.the_classes), this.options.onInvalid.call(this.$node)) } catch (f) { b = f, this.$node.addClass(this.options.the_classes), this.options.onInvalid.call(this.$node) } return null }, d }(), b.fn.validarCedulaEC = function (a) { return this.each(function () { return new d(b(this), a) }), this }, b.fn.validarCedulaEC.RucValidatorEc = c, b.fn.validarCedulaEC.defaults = {
            strict: !0, events: "change", the_classes: "invalid", onValid: function () { return null },
            onInvalid: function () { return null }
        }
    }(jQuery)
}).call(this);