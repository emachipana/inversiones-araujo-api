<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      "url" => $this->faker->randomElement([
        "https://http2.mlstatic.com/D_NQ_NP_703223-MLC32168119697_092019-O.webp",
        "https://hagalo.mx/23210-large_default/tijera-para-podar-curva-8-pulgadas-truper-18453.jpg",
        "https://http2.mlstatic.com/D_NQ_NP_851478-MLA54911942504_042023-O.webp",
        "https://hydroenv.com.mx/catalogo/images/00/soluciones_y_nutrientes/fertilizantes/Fertilizantes/cab.jpg",
        "https://acdn.mitiendanube.com/stores/001/656/903/products/d67322e1-0618-4bee-b6bc-3c3cdc5e9ef0-989ef0a3689e326d5416566333038141-640-0.webp",
        "https://m.media-amazon.com/images/I/51xWfg1ybeL._AC_UF894,1000_QL80_.jpg",
        "https://http2.mlstatic.com/D_NQ_NP_928869-MPE73022484801_112023-O.webp",
        "https://www.riegofincatec.com/wp-content/uploads/2020/12/conector-inicial-437x400.jpg",
        "https://www.riegofincatec.com/wp-content/uploads/2023/02/MANGUERA-NEGRA-HDPE-PN10.jpg",
        "https://mundoconstructor.com.pe/wp-content/uploads/2022/12/MAN-1-2R.jpg",
        "https://http2.mlstatic.com/D_NQ_NP_906282-MLM27644667791_062018-O.webp",
        "https://plazavea.vteximg.com.br/arquivos/ids/4543954-512-512/image-b53e949052824469801e341ea8941085.jpg",
        "https://www.vemersu.pe/wp-content/uploads/2021/11/117.png",
        "https://agriplant.pe/wp-content/uploads/2020/01/PlugMix8.jpg",
        "https://dojiw2m9tvv09.cloudfront.net/50562/product/bisturi-211322.jpg",
        "https://dojiw2m9tvv09.cloudfront.net/50562/product/l4447.jpg",
        "https://www.grupocoensa.com/wp-content/uploads/2021/05/mascarilla-3-pliegues.jpg",
        "https://kitlab.exa.unicen.edu.ar/erlenmyer.jpg",
        "https://www.molinosycia.com/wp-content/uploads/2020/11/molinos-y-cia-productos-fertilizantes-nitrogenados-urea-agricola-2.png",
        "https://www.molinosycia.com/wp-content/uploads/2020/11/molinos-y-cia-productos-fertilizantes-potasicos-cloruro-de-potasio-rojo-1.png",
        "https://www.molinosycia.com/wp-content/uploads/2020/11/molinos-y-cia-productos-fertilizantes-compuestos-mezcla-molimax-molimax-superdoce-1.png"
      ])
    ];
  }
}
