<?php

namespace Loevgaard\DandomainFoundationBundle\UpdatedEntityProvider;

class UpdatedProductProvider extends UpdatedEntityProvider
{
    /**
     * @return \stdClass|\Generator
     */
    public function getUpdatedEntities(): \Generator
    {
        $modifiedInterval = $this->getModifiedInterval();
        $pageSize = 100;

        $modifiedProductCount = $this->api->productData->countByModifiedInterval($modifiedInterval['start'], $modifiedInterval['end']);
        $pages = ceil($modifiedProductCount / $pageSize);

        for ($page = 1; $page <= $pages; ++$page) {
            $products = \GuzzleHttp\json_decode((string) $this->api->productData->getDataProductsInModifiedInterval(
                $modifiedInterval['start'], $modifiedInterval['end'], $page, $pageSize)->getBody()
            );

            foreach ($products as $product) {
                yield $product;
            }
        }
    }
}
