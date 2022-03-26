<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SujetosTableSeeder extends Seeder
{
    /*
    * Sujetos  por default en la base de datos
    */
    static $Sujetos = [
        [1, 1, '0100230630', 'EDUARDO', '', '', 'QUITO', 'maliciacardenas@hotmail.com', 1, 1, 1, '2021-01-16 15:52:41.130'],
        [2, 1, '0100753383', 'HECTOR', 'RUILOVA', '0995700663', 'BELLAVISTA', 'hrcosaco@hotmail.com', 1, 2, 2, '2022-03-05 17:10:12.220'],
        [3, 1, '0101048338', 'GONZALO', 'CARDENAS', '2923107', 'EL BATAN', 'gecardenas1@hotmail.com', 1, 3, 3, '2021-07-28 13:39:18.367'],
        [4, 1, '0101117794', 'ARTURO', 'CORDOVA', '2343932', 'CONOCOTO', 'arturocordoval@hotmail.com', 1, 1, 1, '2021-11-20 20:18:18.397'],
        [5, 1, '0101229771', 'MARIA ROSA', 'MARCHAN', '0961021900', 'AV 6 D EDICIEMBRE 36 34', 'mariavoz@hotmail.com', 1, 2, 2, '2022-03-13 19:49:24.150'],
        [6, 1, '0101384477', 'CORNELIO', 'VICUÑO', '2860147', 'CUENCA', 'cbicuar514@hotmail.com', 1, 3, 3, '2021-03-23 14:48:05.037'],
        [7, 1, '0101497568', 'CARLOS', 'LOPEZ', '2860411', 'CAPELO', 'maisabelmartinez.ec@gmail.com', 1, 1, 1, '2021-02-13 20:49:08.790'],
        [8, 1, '0101843571', 'JORGE', 'FEIJOO', '2355438', 'PUSUQUI', 'jorge.g.feijoo.v@gmail.com', 1, 2, 2, '2021-01-23 17:11:39.790'],
        [9, 1, '0102017092', 'PAUL', 'MOREJON JARAMILLO', '2562170', 'GONZALEZ SUAREZ', '', 1, 3, 3, '2021-03-16 20:08:18.330'],
        [10, 1, '0102106051', 'JUAN ', 'TORRES', '2436889', 'FRANCISCO DE NATES', 'vintitojf@hotmail.com', 1, 1, 1, '2021-10-10 16:35:27.400'],
        [11, 1, '0102261088', 'JUAN', 'PALACIOS', '0995651694', 'GUAPULO', 'jpalaciosi@hotmail.com', 1, 2, 2, '2020-09-08 15:29:28.237'],
        [12, 1, '0102334596', 'NUBE', 'CASTRO', '0984254551', 'CHARLES DARWIN', 'nube09@gmail.com', 1, 3, 3, '2022-01-28 14:55:51.043'],
        [13, 1, '0102531068', 'MARGARITA', 'LEDESMA', '2229289', 'CUMBAYA', 'gerencia@italcom.ec', 1, 1, 1, '2020-07-03 15:13:58.250'],
        [14, 1, '0102531076', 'LORENA', 'LEDESMA', '0999730180', 'BELLAVISTA', 'lorenaledesma68@hotmail.com', 1, 2, 2, '2020-09-12 16:57:56.507'],
        [15, 1, '0102616315', 'ANDRES', 'CRESPO', '0995000969', 'LA CAROLINA', 'candresrobertoz@gmail.com', 1, 3, 3, '2021-06-13 18:05:30.250'],
        [16, 1, '0102791845', 'ANDRES ', 'ASTUDILLO', '0992669454', 'LA  CONCEPCION', 'dra.astusilva@hotmail.com', 1, 1, 1, '2022-02-14 21:38:38.203'],
        [17, 1, '0102863552', 'ALFREDO', 'MORA G', '0979329029', 'SAN RAFAEL', 'goitar29@gmail.com', 1, 2, 2, '2022-03-25 13:50:47.727'],
        [18, 1, '0102954740', 'MARCO', 'TELLO S', '0998158385', 'GONZALES SUAREZ', 'msnowblind@gmail.com', 1, 3, 3, '2021-02-26 15:57:54.727'],
        [19, 1, '0102992591', 'GABRIELA', 'GOMEZ', '0995107358', 'BOSSANO Y JATVA', 'gabgomez@hotmail.com', 1, 1, 1, '2021-11-17 20:29:55.687'],
        [20, 1, '0103384517', 'MONICA', 'RIQUETTI', '2060124', 'VISTA GRANDE 159', 'mriquetti@gmail.com', 1, 2, 2, '2021-11-25 19:32:10.867'],
        [21, 1, '0103427464', 'JUAN JOSE', 'JARAMILLO', '2899175', 'MIRAVALLES 3', 'chino.jaramillo@hotmail.com', 1, 3, 3, '2021-08-21 16:50:21.063'],
        [22, 1, '0103436499', 'DANIELO', 'AREVALO', '0999178040', 'SAN BLAS', 'vdanarevalo@yahoo.es', 1, 1, 1, '2020-08-21 15:41:23.533'],
        [23, 1, '0103468542', 'CRISTINA', 'ARTEAGA', '0990504344', 'QUITO TENIS', 'arteagacristi@gmail.com', 1, 2, 2, '2022-01-02 14:22:13.050'],
        [24, 1, '0103597779', 'ANA', 'AVILA', '0984031313', 'GRANDA CENTENO', 'avac75@hotmail.com', 1, 3, 3, '2022-02-14 14:06:13.427'],
        [25, 1, '0103667531', 'PEDRO', 'ORELLANA', '0991000318', 'LA FLORESTA', 'pedrorellana@gmail.com', 1, 1, 1, '2020-06-30 17:45:54.810'],
        [26, 1, '0103903688', 'FABIAN', 'PESANTEZ', '6038344', 'COTOCOLLAO', 'esteban.pesantez@hotmail.com', 1, 2, 2, '2021-10-21 15:11:51.503'],
        [27, 1, '0103922068', 'BRISEIDA', 'ORDOÑEZ', '0984673196', 'BENALCAZAR', 'brisa.oc@hotmail.com', 1, 3, 3, '2021-07-24 21:06:16.007'],
        [28, 1, '0103931382', 'ANDREA', 'BRAVO', '9999999', 'CUENCA', 'andrebare@gmail.com', 1, 1, 1, '2021-03-11 20:42:34.943'],
        [29, 1, '0103941373', 'JOHANNA', 'GUZMAN', '0958840229', 'ELOY ALFARO', 'johannagro88@gmail.com', 1, 2, 2, '2022-02-14 14:48:53.570'],
        [30, 1, '0104119474', 'SAMANTHA', 'BACUILIMA', '0996865413', 'LOS GRANADOS Y LAS HIEDRAS', 'sambaculima@gmail.com', 1, 3, 3, '2021-07-06 20:27:17.370'],
        [31, 1, '0104123203', 'ESTEFANIA', 'YANEZ', '0991618543', 'JIPIJAPA', 'estfania1409@hotmail.com', 1, 1, 1, '2021-10-01 14:59:38.357'],
        [32, 1, '0104129556', 'JOSUE', 'DURAN', '0988225523', 'CUENCA', 'josueduranhermida@hotmail.com', 1, 2, 2, '2021-03-16 15:08:39.710'],
        [33, 1, '0104169396', 'LADY', 'AREVALO', '0998502745', 'IÑAQUITO', 'lady3185@hotmail.com', 1, 3, 3, '2021-08-08 18:19:55.687'],
        [34, 1, '0104205760', 'ANDREA', 'DURIES', '0991450523', 'QUITO TENNIS', 'andreaduries@gmail.com', 1, 1, 1, '2022-03-22 20:49:16.400'],
        [35, 1, '0104235791', 'GINA', 'LOBATO CORDERO', '0991111840', 'LA CAROLINA', 'ginasoloco@hotmail.com', 1, 2, 2, '2021-12-04 14:07:19.633'],
        [36, 1, '0104530068', 'FRANKLIN', 'UGUÑA', '0958980156', '6 DE DICIEMBRE Y CARRION', 'franklinuguna@hotmail.com', 1, 3, 3, '2021-04-15 17:35:26.353'],
        [37, 1, '0104566260', 'JUANA', 'FERNANDEZ', '9999999', 'SAN BLAS', '', 1, 1, 1, '2021-02-19 20:05:59.327'],
        [38, 1, '0104567151', 'FRANCISCO', 'BERMEO', '0987626548', '6 DE DICIEMBRE', 'francisco.bermeo.ca@gmail.com', 1, 2, 2, '2021-05-07 14:10:53.547'],
        [39, 1, '0104639315', 'JULIO', 'PAÑI', '0999972201', 'ISABEL LA CATOLICA Y CORUÑA', 'juliopaniledesma@gmail.com', 1, 3, 3, '2021-11-02 16:51:18.190'],
        [40, 1, '0104643952', 'VICTORIA', 'PEREZ', '0984555501', 'ANTONIO LLORET', 'vperezleon@outlook.com', 1, 1, 1, '2021-12-30 15:30:56.170'],
        [41, 1, '0104678446', 'DOLORES', 'VINTIMILLA', '3801666', 'NAYON', 'dolores86vintimilla@gmail.com', 1, 2, 2, '2021-03-03 14:23:47.187'],
        [42, 1, '0104797626', 'CLAUDIA', 'BERMEO', '09922700952', 'MANUEL CORRAL', 'claudiab23@gmail.com', 1, 3, 3, '2021-10-21 16:05:41.207'],
        [43, 1, '0104802483', 'ANGELICA', 'SANCHEZ', '2858913', 'CUENCA', 'asanchez807@hotmail.com', 1, 1, 1, '2022-01-15 14:32:33.597'],
        [44, 1, '0105141444', 'MARIA', 'DURAN', '2248081', 'EL BATAN', 'belenduranf@gmail.com', 1, 2, 2, '2021-10-04 19:17:24.107'],
        [45, 1, '0105271613', 'MARIA', 'SOL PALACIOS', '3238174', 'GUAPULO', 'solpalacios1995@gmail.com', 1, 3, 3, '2021-04-09 16:52:48.463'],
        [46, 1, '0105362651', 'DIEGO', 'MONTUFAR', '', 'PINAR ALTO', 'diego.montufar@gmail.com', 1, 1, 1, '2021-10-02 16:58:59.993'],
        [47, 1, '0105687396', 'MISHELL', 'MANTILLA', '0992607627', 'CUENCA', 'mishumantilla_9@hotmail.com', 1, 2, 2, '2022-02-04 15:11:54.057'],
        [48, 1, '0105728612', 'DIEGO', 'ULLOA', '0995434767', 'COMITE DEL PUEBLO', 'spndeportivo@gmail.com', 1, 3, 3, '2021-06-01 20:50:14.813'],
        [49, 1, '0106709850', 'MARIA AUGUSTA', 'VAZQUEZ', '0983431044', 'QUITO', 'aangavazquez@gmail.com', 1, 1, 1, '2021-04-02 16:55:06.203'],
        [50, 1, '0151525011', 'JUAN', 'RANGEL', '0967413036', 'QUITO', 'jrangelmv@hotmail.com', 1, 2, 2, '2020-11-17 18:58:50.190'],
        [51, 2, '0101337566001', 'NARCISA DE JESUS', 'ARIAS VICUNA', '999999', 'Quito', 'administracion@umai.ec', 1, 3, 1, '2021-04-27 17:09:31.747'],
        [52, 2, '0102019767001', 'TIGRE SEGARRA', 'JUAN ANGEL', '022021794', 'COLONIA S/H Y PANAMERICANA', 'tigresegarrajuan@gmail.com', 1, 1, 2, '2020-08-04 10:04:33.947'],
        [53, 2, '0102416468001', 'MAX', 'ANDRADE', '018601908', 'QUITO', 'max.andr@gmail.com', 1, 2, 3, '2021-04-30 14:56:46.707'],
        [54, 2, '0102423571001', 'JOSE ANTONIO', 'TORAL', '0998661730', 'LA CAROLINA', 'dosa.arq@gmail.com', 1, 3, 1, '2021-03-11 20:55:08.340'],
        [55, 2, '0102519337001', 'KARINA', 'ASTUDILLO', '0949012912', 'EL BOSQUE', 'icariluastudillo@gmail.com', 1, 1, 2, '2021-06-28 14:30:44.473'],
        [56, 2, '0102753340001', 'VELASTEGUI', 'GREYS', '072842225', 'LUIS CORDERO', 'gracevelastegui@yahoo.com', 1, 2, 3, '2021-01-25 14:29:06.590'],
        [57, 2, '0104940556001', 'DIANA', 'BRAVO', '0995132297', 'CUENCA', 'dianabravolo9@gmail.com', 1, 3, 1, '2021-06-23 20:32:47.190'],
        [58, 2, '0104990551001', 'ESTEBAN', 'SOLANO', '99999999', 'MARIANA DE JESUS', 'info@amaruec.org', 1, 1, 2, '2021-01-23 20:43:28.810'],
        [59, 2, '0107139669001', 'PEDRO', 'GUTIERREZ', '2370118', 'AV. MEDIO EJIDO', 'gutiguev10@gmail.com', 1, 2, 3, '2021-10-25 15:32:52.597'],
        [60, 2, '0190146677001', 'ALEM CIA LTDA', '', '3436006', 'GASPAR DE VILLARROEL', 'contabilidad@alem.com.ec', 1, 3, 1, '2022-02-04 15:59:23.370'],
        [61, 2, '0190430162001', 'IMPORTXEM CIA LTDA', '', '0992321029', 'CUENCA', 'importxem@gmail.com', 1, 1, 2, '2021-02-19 20:48:32.563'],
        [62, 2, '0190499472001', 'LINAJEMUEBLES CIA LTDA', '', '0995503532', 'CUENCA', 'info@linajemuebles.com', 1, 2, 1, '2021-11-01 16:08:16.983'],
        [63, 2, '0201340650001', 'ALEX', 'MEJIA', '2503980', 'QUITO', 'contabilidad@notaria22quito.com', 1, 3, 2, '2022-01-28 15:30:18.877'],
        [64, 2, '0202029161001', 'EMMA', 'AGUILAR', '0999382061', 'ISABEL LA CATOLICA', 'emyaguilaralds@hotmail.com', 1, 1, 3, '2021-05-29 18:58:31.450'],
        [65, 2, '0300777679001', 'EDGAR', 'ROJAS', '2688611', 'SAN BARTOLO', 'edgarrojasgonzalez@gmail.com', 1, 2, 1, '2020-10-23 14:06:11.607'],
        [66, 2, '0301839866001', 'SEBASTIAN', 'PESANTES', '0997387054', 'CCNU', 'info@knowwadsoft.com', 1, 3, 2, '2021-04-17 15:25:17.093'],
        [67, 2, '0302008024001', 'GABRIELLA', 'MORENO', '0983978086', 'LA FLORESTA', 'basloromeroc@yahoo.es', 1, 1, 3, '2021-10-07 21:56:32.467'],
        [68, 2, '0390011024001', 'Lacteos San Antonio', '', '999999999', 'balzar', 'administracion@gmail.com', 1, 2, 1, '2020-10-09 12:59:40.383'],
        [69, 2, '0400713764001', 'ISAAC', 'POZO', '0995520644', 'CARAPUNGO', 'isaacpozo64@hotmail.com', 1, 3, 2, '2021-05-28 20:47:55.283'],
        [70, 2, '0401196696001', 'FREDDY', 'ALMEIDO', '3216856', 'VERSALLER', 'freddyalmeidavalencia@hotmail.com', 1, 1, 3, '2020-06-21 13:34:52.323'],
        [71, 2, '0401314539001', 'ANDREA', 'ROSERO', '098 460 5802', 'QUITO', 'andyy290579@hotmail.com', 1, 2, 1, '2021-11-05 21:22:21.607'],
        [72, 2, '0401341813001', 'VERONICA', 'MONTENEGRO', '0998244809', 'NAYON', 'lmediavilla@min.com.ec', 1, 3, 2, '2021-12-30 15:58:24.127'],
        [73, 2, '0401365929001', 'ELIANE', 'DONOSO', '0995606974', 'EL DORADO', 'elianedonoso@gmail.com', 1, 1, 1, '2021-08-02 15:00:56.107'],
        [74, 2, '0401487467001', 'SUSAN', 'ORTEGA', '0984827482', 'ISABEL LA CATOLICA', 'susyortega_25@hotmail.com', 1, 2, 2, '2020-07-16 15:23:37.337'],
        [75, 2, '0401819404001', 'MARILYN', 'YEPEZ', '0963344755', 'LUGO Y PASAJE 1', 'marilynyepez@gmail.com', 1, 3, 3, '2022-02-14 16:29:09.773'],
        [76, 2, '0500010715001', 'LEONARDO', 'MUÑOZ', '032701153', 'LA TACUNGA', 'leonardomzch@gmail.com', 1, 1, 1, '2020-08-26 17:23:47.013'],
        [77, 2, '0500899927001', 'MARIA', 'FELIX', '2842828', 'SANGOLQUI', 'mery.felix.vela@hotmail.com', 1, 2, 2, '2020-12-28 15:35:16.493'],
        [78, 2, '0501117378001', 'NANCEY', 'MOLINA', '2700178', 'PASTOCALLE', 'markinj34@gmail.com', 1, 3, 3, '2021-11-12 19:42:17.223'],
        [79, 2, '0501168025001', 'MONICA', 'TITO', '0978791275', 'CENTRO HISTORICO', 'cafeteriafabiolita@gmail.com', 1, 1, 1, '2021-03-19 16:31:36.363'],
        [80, 2, '0501598130001', 'GRACIELA', 'ARAUJO', '2444936', 'LA Y', 'ecuepherme@hotmail.com', 1, 2, 2, '2021-06-28 16:15:52.040'],
        [81, 2, '0502486376001', 'GABRIELA', 'CHAVEZ', '0984489891', 'LA MARISCAL', 'wax3369@gmail.com', 1, 3, 3, '2021-09-03 14:49:14.153'],
        [82, 2, '0502636061001', 'JAIME GONZALO', 'ACOSTA TIGLLA', '0993103073', 'Gonzalez de la Vega N6-50', 'administracion@umai.ec', 1, 1, 1, '2021-02-03 10:59:57.673'],
        [83, 2, '0503108771001', 'FRANSHESCA', 'YEPEZ', '0969730524', 'CDLA ATAHUALPA', 'franshesca.yepez94@gmail.com', 1, 2, 2, '2021-11-09 20:10:40.047'],
        [84, 2, '0503350076001', 'JUAN', 'TAPIA', '0995421660', 'EL DORADO', 'jhonta16@gmail.com', 1, 3, 3, '2022-01-10 13:50:42.313'],
        [85, 2, '0503379174001', 'FRANKLIN', 'GAVILANES', '', 'LUIS CORDERO', 'franklingm87@hotmail.com', 1, 1, 1, '2022-02-04 17:28:35.797'],
        [86, 2, '0590055328001', 'FUENTES SAN FELIPE S.A.', '', '02253162', 'Cuba s/n y pasaje Eloy A Latacunga Ecuador', '', 1, 2, 3, '2020-06-18 13:16:30.003'],
        [87, 2, '0600803753001', 'LILIAN', 'GRANDA PAEZ', '0998028828', 'MONTESERRIN', 'lgrandap@gmail.com', 1, 3, 1, '2021-09-21 20:49:35.397'],
        [88, 2, '0601907215001', 'MARCELO', 'HERRERA', '2317357', 'TAMBILLO', 'drmarceloherrera@gmail.com', 1, 1, 1, '2021-02-24 14:46:05.470'],
        [89, 2, '0602047482001', 'JIMI', 'DE LA CRUZ', '2947719', 'RIOBAMBA', 'joshuadelacruz@hotmail.com', 1, 2, 2, '2021-07-05 13:21:45.440'],
        [90, 2, '0602285025001', 'MARIA', 'SUICA', '2606068', 'CONOCOTO', '', 1, 3, 3, '2021-11-13 21:25:57.477'],
        [91, 2, '0602399271001', 'MAURO', 'PIÑAS', '2901822', 'MERCADILLO', 'mauro19kavezon@gmail.com', 1, 1, 1, '2021-03-06 17:12:12.757'],
        [92, 2, '0602476855001', 'ALVARO', 'MEJIA SALAZAR', '229220', 'QUITO', 'facturasalvaro@yahoo.com', 1, 2, 2, '2021-07-15 14:17:41.537'],
        [93, 2, '0602552408001', 'TANYA', 'ZAMORA', '0984509794', 'CUMBAYA', 'tandre202@hotmail.com', 1, 3, 3, '2021-07-02 16:49:30.550'],
        [94, 2, '0602982878001', 'CRISTOBAL', 'BOSMEDIANO', '0984679245', 'ORELLANA Y WHYMPER', 'c.bosmediano@live.com', 1, 1, 1, '2021-02-27 19:14:38.793'],
        [95, 2, '0603203225001', 'LUIS', 'VERA', '2608443', 'RIOBAMBA', 'luiso100@hotmail.com', 1, 2, 2, '2021-06-03 15:37:02.167'],
        [96, 2, '0603719782001', 'LUCIA', 'ASTUDILLO', '0994541421', 'RIOBAMBA', 'lucyastu@gmail.com', 1, 3, 3, '2021-02-02 20:47:52.750'],
        [97, 2, '0603805888001', 'CARLOS', 'MONTALVO', '0983806633', 'LA MARISCAL', 'cemontalvop@hotmail.com', 1, 1, 1, '2021-08-13 21:19:08.680'],
        [98, 2, '0604173674001', 'SANTIAGO', 'CHAVEZ', '0980961236', 'QUITO', 'sesantiagochavez@gmail.com', 1, 2, 2, '2021-07-23 21:19:57.523'],
        [99, 2, '0604183475001', 'ANDRES', 'POMBOZA', '0984519243', 'RIOBAMBA', 'apomboza@gmail.com', 1, 3, 3, '2021-02-27 18:13:20.547'],
        [100, 2, '0604261198001', 'JULIANO', 'OLEAS', '0992892403', 'AV ILALO', 'juliano14@hotmail.es', 1, 1, 1, '2021-04-10 16:21:15.330']
    ];

    /**
     * Corre insert en la tabla
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        foreach (self::$Sujetos as $Sujeto) {

            DB::table('sujetos')->insert([
                'Id' => $Sujeto[0],
                'TipoSujeto' => $Sujeto[1],
                'DNI' =>  $Sujeto[2],
                'Nombre' =>  $Sujeto[3],
                'Apellido' =>  $Sujeto[4],
                'Telefono' =>  $Sujeto[5],
                'Direccion' =>  $Sujeto[6],
                'Email' =>  $Sujeto[7],
                'Activo' =>  $Sujeto[8],
                'UserCreated' =>  $Sujeto[9],
                'UserUpdated' => $Sujeto[10],
                'created_at' => $Sujeto[11],
                'updated_at' => $date
            ]);
        }
    }
}
