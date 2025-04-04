<?php

namespace App\Helpers;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * App\Helpers
 *
 * @package App\Helpers\Paginator
 * @copyright Copyright (c) 2025, jarvis.phongtran
 * @author Phong <jarvis.phongtran@gmail.com>
 */
class Paginator
{
    private string $pageName = 'page';

    private int $perPage = 20;

    private $currentPage;

    private bool $perPageFlag = false;

    private string $perPageName = 'per_page';

    /**
     * Set Current Page
     */
    public function setCurrentPage(mixed $currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    /**
     * Get Current Page
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getCurrentPage(): int
    {
        $page = request()->get($this->getPageName()) ?? 1;

        return (int) $page;
    }

    /**
     * Get per page
     */
    public function setPerPage(mixed $perPage): void
    {
        $this->perPage = $perPage;
        $this->perPageFlag = true;
    }

    /**
     * Get per page
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function getPerPage(): int
    {
        $parPage = (int) request()->get($this->perPageName);
        if (! $this->perPageFlag && $parPage > 0) {
            return $parPage;
        }

        return $this->perPage;
    }

    /**
     * Get page name
     */
    public function getPageName(): string
    {
        return $this->pageName;
    }

    /**
     * Set page name
     */
    public function setPageName(mixed $pageName): void
    {
        $this->pageName = $pageName;
    }

    /**
     * Get offset
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    final public function getOffset(): float|int
    {
        $offset = $this->getCurrentPage() - 1 > 0 ? $this->getCurrentPage() - 1 : 0;

        return $offset * $this->getPerPage();
    }

    /**
     * Get per page name
     */
    public function getPerPageName(): string
    {
        return $this->perPageName;
    }

    /**
     * Set per page name
     */
    public function setPerPageName($perPageName): void
    {
        $this->perPageName = $perPageName;
    }

    /**
     * Get current page and page size
     *
     * @return int[]
     */
    public static function getPageSize(): array
    {
        $request = request()->toArray();
        $pageSizeFromRequest = array_key_exists('limit', $request)
            ? (int) ($request['limit'] ?? 0)
            : 15;
        $pageSize = max(min($pageSizeFromRequest, 50), 15);
        $currentPage = isset($request['page']) ? (int) $request['page'] : 1;

        return [
            'page' => $currentPage,
            'limit' => $pageSize,
        ];
    }
}
